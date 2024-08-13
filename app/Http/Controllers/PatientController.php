<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function loadPatientDashboard()
    {
        return view('patient.dashboard');
    }

    public function loadDoctorBySpeciality($speciality_id)
    {
        $id = $speciality_id;
        return view('patient.doctor-by-speciality', compact('id'));
    }

    public function loadMyAppointments()
    {
        return view('patient.my-appointments');
    }

    public function loadArticles()
    {
        return view('patient.articles');
    }

    public function loadBookingPage($id)
    {
        $doctor = Doctor::with('speciality', 'user')->where('id', $id)->first();
        return view('patient.booking-page', compact('doctor'));
    }

}
