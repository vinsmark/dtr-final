<?php

namespace App\Livewire;

use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Livewire\Component;

class DtrReport extends Component
{
    public string $dateFrom = '';

    public string $dateTo = '';

    public string $employeeCode = '';

    public array $dtrData = [];

    public bool $generated = false;

    public $employeeList = [];

    public function mount(): void
    {
        $this->dateFrom = now()->startOfMonth()->format('Y-m-d');
        $this->dateTo = now()->endOfMonth()->format('Y-m-d');

        $this->employeeList = Employee::whereNotNull('employee_code')
            ->where('active', true)
            ->orderBy('lastname')
            ->orderBy('firstname')
            ->get(['employee_code', 'lastname', 'firstname', 'middlename']);
    }

    public function generate(): void
    {
        $this->validate([
            'dateFrom' => 'required|date',
            'dateTo' => 'required|date|after_or_equal:dateFrom',
            'employeeCode' => 'nullable|string',
        ]);

        $this->dtrData = [];
        $this->generated = false;

        $query = Attendance::whereBetween('log_time', [
            $this->dateFrom.' 00:00:00',
            $this->dateTo.' 23:59:59',
        ])->orderBy('employee_code')->orderBy('log_time');

        if ($this->employeeCode !== '') {
            $query->where('employee_code', $this->employeeCode);
        }

        $logs = $query->get();

        $employeeMap = Employee::whereNotNull('employee_code')
            ->get(['employee_code', 'lastname', 'firstname', 'middlename'])
            ->keyBy('employee_code');

        $grouped = [];
        foreach ($logs as $log) {
            $emp = $log->employee_code;
            $date = $log->log_time->format('Y-m-d');
            $time = $log->log_time->format('H:i');
            $grouped[$emp][$date][] = $time;
        }

        foreach ($grouped as $emp => $dates) {
            $employee = $employeeMap[$emp] ?? null;
            $fullName = $employee
                ? trim($employee->lastname.', '.$employee->firstname.' '.$employee->middlename)
                : $emp;

            $rows = [];
            $current = Carbon::parse($this->dateFrom);
            $end = Carbon::parse($this->dateTo);

            while ($current->lte($end)) {
                $dateKey = $current->format('Y-m-d');
                $times = $dates[$dateKey] ?? [];

                $timeIn = $times[0] ?? null;
                $timeOut = count($times) > 1 ? end($times) : null;

                $lateMinutes = 0;
                $undertimeMinutes = 0;
                $totalMinutesRendered = 0;

                if ($timeIn && $timeOut) {
                    $logIn = Carbon::parse($dateKey.' '.$timeIn);
                    $logOut = Carbon::parse($dateKey.' '.$timeOut);

                    $scheduleIn = Carbon::parse($dateKey.' 08:00:00');
                    if ($logIn->gt($scheduleIn)) {
                        $lateMinutes = $logIn->diffInMinutes($scheduleIn);
                    }

                    $scheduleOut = Carbon::parse($dateKey.' 17:00:00');
                    if ($logOut->lt($scheduleOut)) {
                        $undertimeMinutes = $logOut->diffInMinutes($scheduleOut);
                    }

                    $totalMinutesRendered = $logIn->diffInMinutes($logOut);
                }

                $rows[] = [
                    'date' => $dateKey,
                    'day' => $current->format('D'),
                    'time_in' => $timeIn,
                    'time_out' => $timeOut,
                    'late' => $lateMinutes,
                    'undertime' => $undertimeMinutes,
                    'rendered' => $totalMinutesRendered,
                    'all_times' => $times,
                ];

                $current->addDay();
            }

            $this->dtrData[] = [
                'employee_code' => $emp,
                'employee_name' => $fullName,
                'rows' => $rows,
            ];
        }

        $this->generated = true;
    }

    public function render()
    {
        return view('livewire.dtr.index')->title('DTR Report');
    }
}
