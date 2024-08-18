<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('dashboard', 'dashboard')
->middleware(['auth', 'verified', 'patient'])
->name('dashboard');

Route::get('/filter-by-speciality/{speciality}', [PatientController::class, 'loadDoctorBySpeciality']);
Route::get('/all-doctors', [PatientController::class, 'loadAllDoctors'])->name('all-doctors');
Route::get('/booking/page/{doctor_id}', [PatientController::class, 'loadBookingPage']); 

Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin/dashboard', [AdminController::class, 'loadAdminDashboard'])
    ->name('admin-dashboard');
    
    Route::get('/admin/doctors', [AdminController::class, 'loadDoctorListing'])
    ->name('admin-doctors');

    Route::get('/admin/create/doctor', [AdminController::class, 'loadDoctorForm']);
    Route::get('/admin/create/speciality', [AdminController::class, 'loadSpecialityForm']);
    Route::get('/admin/edit/speciality/{speciality}', [AdminController::class, 'loadEditSpecialityForm']);
    Route::get('/admin/edit/doctor/{doctor}', [AdminController::class, 'loadEditDoctorForm']);
    Route::get('/admin/specialities', [AdminController::class, 'loadAllSpecialities'])
    ->name('admin-specialities');

    Route::get('/admin/appointments', [AdminController::class, 'loadAllAppointments'])
    ->name('admin-appointments');
});

Route::group(['middleware' => 'patient'], function(){
    Route::get('/my-appointments', [PatientController::class, 'loadMyAppointments'])
    ->name('my-appointments');  
    Route::get('/articles', [PatientController::class, 'loadArticles'])
    ->name('articles'); 
});

Route::group(['middleware' => 'doctor'], function(){

    Route::get('/doctor/dashboard', [DoctorController::class, 'loadDoctorDashboard'])
    ->name('doctor-dashboard');
    Route::get('/doctor/appointments', [DoctorController::class, 'loadAllAppointments'])
    ->name('doctor-appointments');
    Route::get('/doctor/schedules', [DoctorController::class, 'loadAllSchedules'])
    ->name('my-schedules');
    Route::get('/doctor/create/schedule', [DoctorController::class, 'loadAddScheduleForm']);
    Route::get('/doctor/edit/schedule/{schedule}', [DoctorController::class, 'loadEditScheduleForm']);

});

require __DIR__.'/auth.php';
