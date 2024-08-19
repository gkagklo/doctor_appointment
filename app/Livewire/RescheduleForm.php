<?php

namespace App\Livewire;

use App\Mail\AppointmentUpdated;
use App\Models\Appointment;
use App\Models\DoctorSchedule;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class RescheduleForm extends Component
{

    public $doctor_details;
    public $appointment_details;
    public $selectedDate;
    public $availableDates = [];
    public $timeSlots = [];

    public function mount($appointment_id)
    {
        $this->appointment_details = Appointment::find($appointment_id);
        $this->doctor_details = $this->appointment_details->doctor;
        $this->fetchAvailableDates($this->doctor_details);
    }

    public function fetchAvailableDates($doctor)
    {
        $schedules = DoctorSchedule::where('doctor_id', $doctor->id)
            ->get();

        $availability = [];
        foreach ($schedules as $schedule) {
            $dayOfWeek = $schedule->available_day; //0 - sunday
            $fromTime = Carbon::createFromFormat('H:i:s', $schedule->from);
            $toTime = Carbon::createFromFormat('H:i:s', $schedule->to);
            $availability[$dayOfWeek] = [
                'from' => $fromTime,
                'to' => $toTime,
            ];
        }

        $dates = [];
        $today = Carbon::today();
        for ($i = 0; $i < 365; $i++) { //1 year
            $date = $today->copy()->addDays($i);
            $dayOfWeek = $date->dayOfWeek;

            if (isset($availability[$dayOfWeek])) {
                $dates[] = $date->format('Y-m-d');
            }
        }

        $this->availableDates = $dates;
    }

    public function selectDate($date)
    {
        $this->selectedDate = $date;
        $this->fetchTimeSlots($date, $this->doctor_details);
    }

    public function fetchTimeSlots($date, $doctor)
    {
        $dayOfWeek = Carbon::parse($date)->dayOfWeek; //0 , 1... 5
        $carbonDate = Carbon::parse($date)->format('Y-m-d');
        $schedule = DoctorSchedule::where('doctor_id', $doctor->id)
            ->where('available_day', $dayOfWeek)
            ->first();

        if ($schedule) {
            $fromTime = Carbon::createFromFormat('H:i:s', $schedule->from);
            $toTime = Carbon::createFromFormat('H:i:s', $schedule->to);

            $slots = [];
            while ($fromTime->lessThan($toTime)) {

                $timeSlot = $fromTime->format('H:i:s');
                $appointmentExists = Appointment::where('doctor_id', $doctor->id)
                    ->where('appointment_date', $carbonDate)
                    ->where('appointment_time', $timeSlot)
                    ->exists();
                if (!$appointmentExists) {
                    $slots[] = $timeSlot;
                }

                $fromTime->addHour();
            }

            $this->timeSlots = $slots;
                    //  dd($this->timeSlots);

        } else {
            $this->timeSlots = [];
        }
    }

    public function updateAppointment($slot)
    {
        $updated_by_details = auth()->user();
        $appointment = Appointment::find($this->appointment_details->id);
        $patient = User::find($appointment->patient_id);
        
        $carbonDate = Carbon::parse($this->selectedDate)->format('Y-m-d');
        $appointment->update([
            'appointment_date' => $carbonDate,
            'appointment_time' => $slot
        ]);
        
        
        $appointmentEmailData = [
            'old_date' => $this->appointment_details->appointment_date,
            'old_time' => Carbon::parse($this->appointment_details->appointment_time)->format('H:i A'),
            'date' => $this->selectedDate,
            'time' => Carbon::parse($slot)->format('H:i A'),
            'location' => '123 Medical Street, Health City',
            'patient_name' => $patient->name,
            'patient_email' => $patient->email,
            'doctor_name' => $this->doctor_details->user->name,
            'doctor_email' => $this->doctor_details->user->email,
            'doctor_specialization' => $this->doctor_details->speciality->speciality_name,
            'updated_by' => $updated_by_details->name,
            'role' => $updated_by_details->role,
        ];
        $this->sendAppointmentNotification($appointmentEmailData);

        session()->flash('message', 'Appointment with Dr'. $this->doctor_details->user->name.' on '. $this->selectedDate .' '.$slot.' updated successfully.');
        if(auth()->user()->role == 2){
            return $this->redirect('/admin/appointments', navigate: true); 
        }elseif(auth()->user()->role == 1){
            return $this->redirect('/doctor/appointments', navigate: true); 
        }else{
            return $this->redirect('/my-appointments', navigate: true); 
        }
          

    }

    public function sendAppointmentNotification($appointmentData)
    {
        // Send to Admin
        $appointmentData['recipient_name'] = 'Admin Admin';
        $appointmentData['recipient_role'] = 'admin';
        Mail::to('ryvonyv@mailinator.com')->send(new AppointmentUpdated($appointmentData));

        // Send to Doctor
        $appointmentData['recipient_name'] = $appointmentData['doctor_name'];
        $appointmentData['recipient_role'] = 'doctor';
        Mail::to($appointmentData['doctor_email'])->send(new AppointmentUpdated($appointmentData));

        // Send to Patient
        $appointmentData['recipient_name'] = $appointmentData['patient_name'];
        $appointmentData['recipient_role'] = 'patient';
        Mail::to($appointmentData['patient_email'])->send(new AppointmentUpdated($appointmentData));

        return 'Appointment notifications sent successfully!';
    }

    public function render()
    {
        return view('livewire.reschedule-form');
    }
}
