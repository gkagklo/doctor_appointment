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

Route::get('/doctor/dashboard', [DoctorController::class, 'loadDoctorDashboard'])
->name('doctor-dashboard')
->middleware('doctor');

Route::get('/filter-by-speciality/{speciality}', [PatientController::class, 'loadDoctorBySpeciality']);

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
});

Route::group(['middleware' => 'patient'], function(){
    Route::get('/my-appointments', [PatientController::class, 'loadMyAppointments'])
    ->name('my-appointments');  
    Route::get('/articles', [PatientController::class, 'loadArticles'])
    ->name('articles'); 
    Route::get('/booking/page/{doctor_id}', [PatientController::class, 'loadBookingPage']); 
});

require __DIR__.'/auth.php';
