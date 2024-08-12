<?php

namespace App\Livewire;

use App\Models\Doctor;
use App\Models\Specialities;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditDoctorForm extends Component
{

    public $doctor;
    public $name;
    public $email;
    public $password;
    public $bio;
    public $hospital_name;
    public $speciality_id;
    public $experience;
    public $twitter;
    public $instagram;
    

    public function mount($doctor_id)
    {
        $this->doctor = Doctor::find($doctor_id);
        $this->name = $this->doctor->user->name;
        $this->email = $this->doctor->user->email;
        $this->bio = $this->doctor->bio;
        $this->hospital_name = $this->doctor->hospital_name;
        $this->speciality_id = $this->doctor->speciality->id;
        $this->experience = $this->doctor->experience;
        $this->twitter = $this->doctor->twitter;
        $this->instagram = $this->doctor->instagram;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'bio' => 'required',
            'hospital_name' => 'required',
            'speciality_id' => 'required',
            'experience' => 'required',
        ]);

        $doctor = Doctor::find($this->doctor->id);
        $user = User::find($this->doctor->user_id);

        $doctor->update([
            'bio' => $this->bio,
            'hospital_name' => $this->hospital_name,
            'speciality_id' => $this->speciality_id,
            'experience' => $this->experience,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
        ]);

        if(!empty($this->password)){
            $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
            ]);
        }else{
            $user->update([
                'name' => $this->name,
                'email' => $this->email
            ]);
        }

        session()->flash('message', 'Doctor updated successfully.');
        return $this->redirect('/admin/doctors');

    }

    public function render()
    {
        return view('livewire.edit-doctor-form', [
            'specialities' => Specialities::all()
        ]);
    }
}
