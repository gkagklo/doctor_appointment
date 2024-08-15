<?php

namespace App\Livewire;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Component;

class StatisticComponent extends Component
{

    public $users_count = 0;
    public $doctors_count = 0;
    public $patients_count = 0;
    public $appointments_count = 0;
    public $doctor_appointments_count = 0;
    public $upcomming_appointments_count = 0;
    public $complete_appointments_count = 0;
    public $last_week_appointments_count = 0;
    public $last_month_appointments_count = 0;
    public $last_week_users_count = 0;
    public $last_month_users_count = 0;
    public $last_week_doctors_count = 0;
    public $last_month_doctors_count = 0;
    public $last_week_patients_count = 0;
    public $last_month_patients_count = 0;
    public $admin_last_week_appointments_count = 0;
    public $admin_last_month_appointments_count = 0;

    public function mount()
    {
        $user_id = auth()->user()->id;
        $this->users_count = User::count();
        $this->doctors_count = Doctor::count();
        $this->patients_count = User::where('role',0)->count();
        $this->appointments_count = Appointment::count();

        $last_week = Carbon::today()->subWeek();
        $last_month = Carbon::today()->subMonth();
        

        $this->doctor_appointments_count = Appointment::with('doctor')->whereHas('doctor', function($query) use($user_id){
            $query->where('user_id', $user_id);
        })->count();    

        $today = date('Y-m-d');
        $this->upcomming_appointments_count = Appointment::with('doctor')->whereHas('doctor', function($query) use($user_id){
            $query->where('user_id', $user_id);
        })->where('appointment_date', '>=', $today)->count();

        $this->complete_appointments_count = Appointment::with('doctor')->whereHas('doctor', function($query) use($user_id){
            $query->where('user_id', $user_id);
        })->where('is_complete', 1)->count();

        $this->last_week_appointments_count = Appointment::with('doctor')->whereHas('doctor', function($query) use($user_id){
            $query->where('user_id', $user_id);
        })->whereBetween('appointment_date', [$last_week, $today])->count();

        $this->last_month_appointments_count = Appointment::with('doctor')->whereHas('doctor', function($query) use($user_id){
            $query->where('user_id', $user_id);
        })->whereBetween('appointment_date', [$last_month, $today])->count();

        $this->last_week_users_count = User::whereBetween('created_at', [$last_week, $today])->count();
        $this->last_month_users_count = User::whereBetween('created_at', [$last_month, $today])->count();

        $this->last_week_doctors_count = Doctor::whereBetween('created_at', [$last_week, $today])->count();
        $this->last_month_doctors_count = Doctor::whereBetween('created_at', [$last_month, $today])->count();

        $this->last_week_patients_count = User::where('role', 0)->whereBetween('created_at', [$last_week, $today])->count();
        $this->last_month_patients_count = User::where('role', 0)->whereBetween('created_at', [$last_month, $today])->count();

        $this->admin_last_week_appointments_count = Appointment::whereBetween('created_at', [$last_week, $today])->count();
        $this->admin_last_month_appointments_count = Appointment::whereBetween('created_at', [$last_month, $today])->count();

    }

    public function render()
    {
        return view('livewire.statistic-component');
    }
}
