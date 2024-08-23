<?php

namespace App\Livewire;

use App\Models\Doctor;
use App\Models\Specialities;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class DoctorCreate extends Component
{

    public $specialities;
    public $name = '';
    public $email = '';
    public $bio = '';
    public $hospital_name = '';
    public $speciality_id = '';
    public $password = '';
    public $password_confirmation = '';
    public $twitter = '';
    public $instagram = '';
    public $experience = '';
    public $user_id = '';

    public function mount()
    {
        $this->specialities = Specialities::all();
    }

    public function register()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'bio' => 'required',
            'hospital_name' => 'required',
            'speciality_id' => 'required',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required|min:4',
            'twitter' => 'string',
            'instagram' => 'string',
            'experience' => 'required'
        ]);

        //user table
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->role = 1;
        $user->password = Hash::make($this->password);
        $user->save();

        //doctor table
        $doctor = new Doctor();
        $doctor->bio = $this->bio;
        $doctor->hospital_name = $this->hospital_name;
        $doctor->speciality_id = $this->speciality_id;
        $doctor->experience = $this->experience;
        $doctor->twitter = $this->twitter;
        $doctor->instagram = $this->instagram;
        $doctor->user_id = $user->id;
        $doctor->save();

        session()->flash('message', 'Doctor created successfully.');
        return $this->redirect('/admin/doctors', navigate: true);

    }

    public function render()
    {
        return view('livewire.doctor-create');
    }
}
