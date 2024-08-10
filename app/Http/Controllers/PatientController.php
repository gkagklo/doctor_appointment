<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function loadPatientDashboard()
    {
        return view('patient.dashboard');
    }
}
