<?php

namespace App\Livewire;

use App\Models\Holiday;
use Livewire\Component;

class HolidayManager extends Component
{
    public $name;

    public $start_date; // Changed from holiday_date

    public $end_date;   // Added for ranges

    public $pre_holiday_date;

    public $post_holiday_date;

    public $type = 'Regular';

    public $holidays;

    public function mount()
    {
        // Order by start_date now
        $this->holidays = Holiday::orderBy('start_date', 'desc')->get();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'pre_holiday_date' => 'required|date|before:start_date',
            'post_holiday_date' => 'required|date|after:end_date',
        ]);

        Holiday::create([
            'name' => $this->name,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'pre_holiday_date' => $this->pre_holiday_date,
            'post_holiday_date' => $this->post_holiday_date,
            'type' => $this->type,
        ]);

        $this->mount();
        $this->reset(['name', 'start_date', 'end_date', 'pre_holiday_date', 'post_holiday_date']);
    }

    public function delete($id)
    {
        Holiday::find($id)->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.holiday.index');
    }
}
