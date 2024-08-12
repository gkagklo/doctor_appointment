<?php

namespace App\Http\Controllers;

use App\Models\Specialities;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loadAdminDashboard()
    {
        return view('admin.dashboard');
    }

    public function loadDoctorListing()
    {
        return view('admin.doctor-listing');
    }

    public function loadDoctorForm()
    {
        return view('admin.doctor-form');
    }

    public function loadSpecialityForm()
    {
        return view('admin.speciality-form');
    }

    public function loadAllSpecialities()
    {
        return view('admin.specialities');
    }

    public function loadEditSpecialityForm($speciality_id)
    {
        return view('admin.edit-speciality-form', compact('speciality_id'));
    }

    public function loadEditDoctorForm($doctor_id)
    {
        return view('admin.edit-doctor-form', compact('doctor_id'));
    }

}
