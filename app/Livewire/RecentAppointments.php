<?php

namespace App\Livewire;

use App\Models\Appointment;
use Livewire\Component;

class RecentAppointments extends Component
{

    public $recent_appointments;

    public function mount()
    {
        $this->recent_appointments = Appointment::with('patient', 'doctor')->orderBy('created_at', 'desc')->limit(10)->get();
    }

    public function render()
    {
        return view('livewire.recent-appointments');
    }
}
