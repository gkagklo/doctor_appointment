@component('mail::message')
# Appointment Update

Dear {{ $appointmentData['recipient_name'] }},

An appointment has been successfully updated with the following details:

### Old Appointment Details:
- **Date:** {{ $appointmentData['old_date'] }}
- **Time:** {{ $appointmentData['old_time'] }}
- **Location:** {{ $appointmentData['location'] }}

### New Appointment Details:
- **Date:** {{ $appointmentData['date'] }}
- **Time:** {{ $appointmentData['time'] }}
- **Location:** {{ $appointmentData['location'] }}

### Patient Details:
- **Name:** {{ $appointmentData['patient_name'] }}
- **Email:** {{ $appointmentData['patient_email'] }}

### Doctor Details:
- **Name:** {{ $appointmentData['doctor_name'] }}
- **Specialization:** {{ $appointmentData['doctor_specialization'] }}

### Appointment Updated By:
- **Name:** {{ $appointmentData['updated_by'] }}
@if ($appointmentData['updated_by'] == 1)
- **Role:** Doctor
@elseif($appointmentData['updated_by'] == 2)
- **Role:** Admin
@else
- **Role:** Patient
@endif

@if($appointmentData['role'] == 2)
## Admin Notification
You are receiving this email because an appointment has been cancelled in your system.
@endif

@if($appointmentData['role'] == 1)
## Doctor Notification
Appointment has been updated with the above details
@endif

@if($appointmentData['role'] == 0)
## Patient Notification
Your appointment has been successfully reschedule.
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent