<?php

namespace App\Http\Controllers;

use App\Models\DoctorSchedule;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function loadDoctorDashboard()
    {
        return view('doctor.dashboard');
    }

    public function loadAllAppointments()
    {
        return view('doctor.appointments');
    }

    public function loadAllSchedules()
    {
        return view('doctor.schedules');
    }

    public function loadAddScheduleForm()
    {
        return view('doctor.schedule-form');
    }

    public function loadEditScheduleForm($schedule)
    {
        $schedule = DoctorSchedule::where('id', $schedule)->first();
        return view('doctor.edit-schedule-form', compact('schedule'));
    }

}
