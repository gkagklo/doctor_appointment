<?php

namespace App\Livewire;

use App\Mail\AppointmentCancelled;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class MyAppointmentsComponent extends Component
{

    public $all_appointments;

    public function mount()
    {
        $this->all_appointments = Appointment::with('patient', 'doctor')->get();
    }

    public function cancel($id)
    {
        $cancelled_by_details = auth()->user();
        $appointment = Appointment::find($id);
        $patient = User::find($appointment->patient_id);
        $doctor = Doctor::find($appointment->doctor_id);

        $appointmentEmailData = [
            'date' => $appointment->appointment_date,
            'time' => Carbon::parse($appointment->appointment_time)->format('H:i A'),
            'location' => '123 Medical Street, Health City',
            'patient_name' => $patient->name,
            'patient_email' => $patient->email,
            'doctor_name' => $doctor->user->name,
            'doctor_email' => $doctor->user->email,
            'doctor_specialization' => $doctor->speciality->speciality_name,
            'cancelled_by' => $cancelled_by_details->name,
            'role' => $cancelled_by_details->role,
        ];
        $this->sendAppointmentNotification($appointmentEmailData);

        $appointment->delete();
        session()->flash('error', 'Appointment cancelled successfully.');
        if(auth()->user() && auth()->user()->role == 0){
            return $this->redirect('/my-appointments', navigate: true);
        }else if(auth()->user() && auth()->user()->role == 1){
            return $this->redirect('/doctor/appointments', navigate: true);
        }else{
            return $this->redirect('/admin/appointments', navigate: true);
        }
        
    }

    public function sendAppointmentNotification($appointmentData)
    {
        // Send to Admin
        $appointmentData['recipient_name'] = 'Admin Admin';
        $appointmentData['recipient_role'] = 'admin';
        Mail::to('ryvonyv@mailinator.com')->send(new AppointmentCancelled($appointmentData));

        // Send to Doctor
        $appointmentData['recipient_name'] = $appointmentData['doctor_name'];
        $appointmentData['recipient_role'] = 'doctor';
        Mail::to($appointmentData['doctor_email'])->send(new AppointmentCancelled($appointmentData));

        // Send to Patient
        $appointmentData['recipient_name'] = $appointmentData['patient_name'];
        $appointmentData['recipient_role'] = 'patient';
        Mail::to($appointmentData['patient_email'])->send(new AppointmentCancelled($appointmentData));

        return 'Appointment notifications sent successfully!';
    }

    public function render()
    {
        return view('livewire.my-appointments-component');
    }
}
