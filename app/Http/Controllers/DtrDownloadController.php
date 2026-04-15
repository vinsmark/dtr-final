<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DtrDownloadController extends Controller
{
    public function single(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
            'from' => 'required|date',
            'to' => 'required|date|after_or_equal:from',
        ]);

        $data = $this->buildDtrData($request->from, $request->to, $request->code);

        abort_if(empty($data), 404, 'No DTR data found for this employee.');

        $pdf = Pdf::loadView('dtr.download', [
            'dtrData' => $data,
            'dateFrom' => $request->from,
            'dateTo' => $request->to,
        ]);

        $pdf->setPaper('a4', 'portrait');

        $filename = "DTR_{$request->code}_{$request->from}_to_{$request->to}.pdf";

        return $pdf->download($filename);
    }

    public function all(Request $request)
    {
        ini_set('memory_limit', '512M');
        set_time_limit(300);
        $request->validate([
            'from' => 'required|date',
            'to' => 'required|date|after_or_equal:from',
        ]);

        $data = $this->buildDtrData($request->from, $request->to);

        abort_if(empty($data), 404, 'No DTR data found.');

        $pdf = Pdf::loadView('dtr.download', [
            'dtrData' => $data,
            'dateFrom' => $request->from,
            'dateTo' => $request->to,
        ]);

        return $pdf->setPaper('a4', 'portrait')->download('DTR_ALL.pdf');
    }

    private function buildDtrData(string $dateFrom, string $dateTo, ?string $employeeCode = null): array
    {
        $query = Attendance::whereBetween('log_time', [
            $dateFrom.' 00:00:00',
            $dateTo.' 23:59:59',
        ])->orderBy('employee_code')->orderBy('log_time');

        if ($employeeCode) {
            $query->where('employee_code', $employeeCode);
        }

        $logs = $query->get();

        $employeeMap = Employee::whereNotNull('employee_code')
            ->get(['employee_code', 'lastname', 'firstname', 'middlename'])
            ->keyBy('employee_code');

        $grouped = [];
        foreach ($logs as $log) {
            $emp = $log->employee_code;
            $date = $log->log_time->format('Y-m-d');
            $grouped[$emp][$date][] = $log->log_time->format('H:i');
        }

        $result = [];
        foreach ($grouped as $emp => $dates) {
            $employee = $employeeMap[$emp] ?? null;
            $fullName = $employee
                ? trim($employee->lastname.', '.$employee->firstname.' '.$employee->middlename)
                : $emp;

            $rows = [];
            $current = Carbon::parse($dateFrom);
            $end = Carbon::parse($dateTo);

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
                ];

                $current->addDay();
            }

            $result[] = [
                'employee_code' => $emp,
                'employee_name' => $fullName,
                'rows' => $rows,
            ];
        }

        return $result;
    }
}
