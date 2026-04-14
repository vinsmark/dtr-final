<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Leave;
use Livewire\Component;

class LeaveManager extends Component
{
    public $employee_id;

    public $leave_type;

    public $start_date;

    public $end_date;

    public $reason;

    public function save()
    {
        $this->validate([
            'employee_id' => 'required',
            'leave_type' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Leave::create([
            'employee_id' => $this->employee_id,
            'leave_type' => $this->leave_type,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'reason' => $this->reason,
        ]);

        $this->reset(['leave_type', 'start_date', 'end_date', 'reason']);
    }

    public function render()
    {
        return view('livewire.leave.index', [
            'leaves' => Leave::with('employee')->latest()->get(),
            'employees' => Employee::all(),
        ]);
    }
}
