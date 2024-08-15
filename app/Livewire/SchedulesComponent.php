<?php

namespace App\Livewire;

use App\Models\DoctorSchedule;
use Livewire\Component;

class SchedulesComponent extends Component
{

    public $daysOfWeek;

    public function mount()
    {
        $this->daysOfWeek = [
            '0' => 'Sunday',
            '1' => 'Monday',
            '2' => 'Tuesday',
            '3' => 'Wednesday',
            '4' => 'Thirsday',
            '5' => 'Friday',
            '6' => 'Saturday',
        ];
    }

    public function delete($schedule_id)
    {
        $schedule = DoctorSchedule::find($schedule_id);
        $schedule->delete();
        session()->flash('error', 'Schedule deleted successfully.');
        return $this->redirect('/doctor/schedules', navigate: true);
    }

    public function render()
    {
        $user_id = auth()->user()->id;
        return view('livewire.schedules-component', [
            'schedules' => DoctorSchedule::with('doctor')->whereHas('doctor', function($query) use($user_id){
                $query->where('user_id', $user_id);
            })->get()
        ]);
    }
}
