<?php

namespace App\Livewire;

use App\Models\DoctorSchedule;
use Livewire\Component;

class EditScheduleForm extends Component
{

    public $schedule;
    public $available_day;
    public $from;
    public $to;

    public $daysOfWeek = [
        '0' => 'Sunday',
        '1' => 'Monday',
        '2' => 'Tuesday',
        '3' => 'Wednesday',
        '4' => 'Thirsday',
        '5' => 'Friday',
        '6' => 'Saturday',
    ];

    public function mount($schedule)
    {
        $this->schedule = DoctorSchedule::find($schedule->id);
        $this->available_day = $schedule->available_day;
        $this->from = $schedule->from;
        $this->to = $schedule->to;
    }

    public function update()
    {
       
        $this->validate([
            'available_day' => 'required',
            'from' => 'required',
            'to' => 'required'
        ]);

        $schedule = DoctorSchedule::find($this->schedule->id);

        $schedule->update([
            'available_day' => $this->available_day,
            'from' => $this->from,
            'to' => $this->to
        ]);

        session()->flash('message', 'Schedule updated successfully.');
        return $this->redirect('/doctor/schedules');

    }

    public function render()
    {
        return view('livewire.edit-schedule-form');
    }
}
