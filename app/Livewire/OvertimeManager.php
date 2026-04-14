<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\Overtime;
use Livewire\Component;

class OvertimeManager extends Component
{
    public $employee_id;

    public $ot_date;

    public $hours;

    public $purpose;

    public function save()
    {
        $this->validate([
            'employee_id' => 'required',
            'ot_date' => 'required|date',
            'hours' => 'required|numeric|min:0.5',
            'purpose' => 'required|min:5',
        ]);

        Overtime::create([
            'employee_id' => $this->employee_id,
            'ot_date' => $this->ot_date,
            'hours' => $this->hours,
            'purpose' => $this->purpose,
            'status' => 'Pending',
        ]);

        $this->reset(['ot_date', 'hours', 'purpose']);
        session()->flash('success', 'Overtime request submitted successfully.');
    }

    public function delete($id)
    {
        Overtime::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.overtime.index', [
            'overtimes' => Overtime::with('employee')->latest()->get(),
            'employees' => Employee::orderBy('lastname')->get(),
        ]);
    }
}
