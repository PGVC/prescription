<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/prescription', function () {
    return view('prescription');
})->name('prescription');

Route::get('/bookings', function () {
    return view('bookings');
})->name('bookings');

Route::get('/patients', function () {
    return view('patients');
})->name('patients');

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::get('/fgtpw', function () {
    return view('forgetpassword');
})->name('forgetpassword');


Route::get('/register', function () {
    return view('registration');
})->name('registration');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/viewpatient', function () {
    return view('viewpatient');
})->name('viewpatient');

Route::get('/viewbooking', function () {
    return view('viewbooking');
})->name('viewbooking');

Route::get('/editpatient', function () {
    return view('editpatient');
})->name('editpatient');

Route::get('/editbooking', function () {
    return view('editbooking');
})->name('editbooking');

// routes for dashboard
Route::get('admin-dashboard',[DashboardController::class, 'add_doctor'])->name('dashboard');

Route::get('doctor-dashboard',[DashboardController::class, 'doctor_dashboard'])->name('dashboard');

Route::get('Assistance-dashboard',[DashboardController::class,'assistance_dashboard'])->name('dashboard');

// routes for admin_add-doctor
Route::get('/add_doctor', function () {
    return view('Admin_Dashboard.add_doctor');
})->name('add_doctor');

