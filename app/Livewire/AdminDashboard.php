<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Leave;
use App\Models\Overtime;
use App\Models\Payroll;
use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-dashboard', [
            'totalEmployees' => Employee::count(),
            'activeEmployees' => Employee::where('active', true)->count(),
            'pendingLeaves' => Leave::where('status', 'Pending')->count(),
            'pendingOT' => Overtime::where('status', 'Pending')->count(),
            'totalPayroll' => Payroll::where('status', 'Paid')->sum('net_salary'),
            'chartData' => Payroll::selectRaw('SUM(net_salary) as total, period_start')
                ->groupBy('period_start')
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }
}
