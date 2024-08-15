<?php

namespace App\Livewire;

use App\Models\Appointment;
use Livewire\Component;

class MyAppointmentsComponent extends Component
{

    public $all_appointments;

    public function mount()
    {
        $this->all_appointments = Appointment::with('patient', 'doctor')->get();
    }

    public function render()
    {
        return view('livewire.my-appointments-component');
    }
}
