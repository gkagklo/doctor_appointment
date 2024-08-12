<?php

namespace App\Livewire;

use App\Models\Doctor;
use App\Models\User;
use Livewire\Component;

class DoctorListingComponent extends Component
{
    public $doctors;
    
    public function mount()
    {
        $this->doctors = Doctor::with('speciality','user')->get();   
    }

    public function delete($doctor_id)
    {
        $doctor = Doctor::find($doctor_id);
        $doctor->delete();
        $user = User::find($doctor->user_id);
        $user->delete();
        session()->flash('error', 'Doctor deleted successfully.');
        return $this->redirect('/admin/doctors', navigate: true);
    }

    public function render()
    {
        return view('livewire.doctor-listing-component');
    }
}
