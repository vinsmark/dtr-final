<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Leave;
use App\Models\Overtime;
use App\Models\Payroll;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class PayrollManager extends Component
{
    public $start_date;

    public $end_date;

    public $selected_employee;

    protected $rules = [
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
    ];

    public function generatePayroll()
    {
        $this->validate();

        $employees = Employee::all();

        foreach ($employees as $emp) {
            $basic = $emp->basic_salary ?? 0;

            $dailyRate = $basic / 22;
            $hourlyRate = $dailyRate / 8;

            $otHours = Overtime::where('employee_id', $emp->id)
                ->where('status', 'Approved')
                ->whereBetween('ot_date', [$this->start_date, $this->end_date])
                ->sum('hours');

            $otPay = $otHours * ($hourlyRate * 1.25);

            $unpaidLeaveDays = Leave::where('employee_id', $emp->id)
                ->where('status', 'Approved')
                ->where('leave_type', 'Unpaid')
                ->whereBetween('start_date', [$this->start_date, $this->end_date])
                ->count();

            $leaveDeduction = $unpaidLeaveDays * $dailyRate;

            $gross = ($basic / 2) + $otPay;
            $net = $gross - $leaveDeduction;

            Payroll::updateOrCreate(
                [
                    'employee_id' => $emp->id,
                    'period_start' => $this->start_date,
                    'period_end' => $this->end_date,
                ],
                [
                    'basic_salary' => $basic,
                    'overtime_pay' => $otPay,
                    'leave_deductions' => $leaveDeduction,
                    'gross_salary' => $gross,
                    'net_salary' => $net,
                    'status' => 'Draft',
                ]
            );
        }

        session()->flash('success', 'Payroll processed successfully for '.$employees->count().' employees.');
    }

    public function markAsPaid($id)
    {
        Payroll::where('id', $id)->update(['status' => 'Paid']);
    }

    public function render()
    {
        $query = Payroll::with('employee');

        if ($this->start_date && $this->end_date) {
            $query->where('period_start', '>=', $this->start_date)
                ->where('period_end', '<=', $this->end_date);
        }

        return view('livewire.payroll.index', [
            'payrolls' => $query->latest()->get(),
        ]);
    }

    public function downloadPayslip($id)
    {
        $payroll = Payroll::with('employee')->findOrFail($id);

        $pdf = Pdf::loadView('pdf.payslip', compact('payroll'));

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'payslip-'.$payroll->employee->lastname.'.pdf');
    }
}
