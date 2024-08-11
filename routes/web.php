<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
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


Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin/dashboard', [AdminController::class, 'loadAdminDashboard'])
    ->name('admin-dashboard');
    
    Route::get('/admin/doctors', [AdminController::class, 'loadDoctorListing'])
    ->name('admin-doctors');

    Route::get('/admin/create/doctor', [AdminController::class, 'loadDoctorForm']);
    Route::get('/admin/create/speciality', [AdminController::class, 'loadSpecialityForm']);
    Route::get('/admin/edit/speciality/{speciality}', [AdminController::class, 'loadEditSpecialityForm']);

    Route::get('/admin/specialities', [AdminController::class, 'loadAllSpecialities'])
    ->name('admin-specialities');
});

require __DIR__.'/auth.php';
