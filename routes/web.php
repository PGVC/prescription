<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AddBookingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/dashboard', [AdminController::class, 'show_doctors'])->name('dashboard');
Route::get('/logout',[AdminController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    Route::get('/prescription', function () {
        return view('prescription');
    })->name('prescription');
    
    Route::get('/bookings', function () {
        return view('bookings');
    })->name('bookings');
    
    Route::get('/patients', function () {
        return view('patients');
    })->name('patients');
    
    
    
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
    })->name('bookings');
    
    Route::get('/editpatient', function () {
        return view('editpatient');
    })->name('editpatient');
    
    Route::get('/editbooking', function () {
        return view('editbooking');
    })->name('editbooking');
    
    
    // routes for admin_add-doctor
    Route::get('/add_doctor', function () {
        return view('Admin_Dashboard.add_doctor');
    })->name('add_doctor');
    
    
    // addbooking
    // Route for showing the booking form
    // Route::get('bookings', [AddBookingController::class, 'create'])->name('bookings.create');
    // Route for submitting the booking form
    Route::post('bookings', [AddBookingController::class, 'store'])->name('bookings.store');
    
    Route::post('/add-doctor',[AdminController::class, 'add_doctor'])->name('add_doctor');
    Route::delete('/delete-doctor/{id}',[AdminController::class, 'delete_doctor'])->name('delete_doctor');

    Route::get('doctor/edit/{id}',[AdminController::class, 'update_doctor'])->name('update_doctor');
    Route::put('doctor/edit/{id}',[AdminController::class, 'save_doctor_update'])->name('save_doctor_update');

    // routes for send mail
    Route::get('/welcome-mail/{username}/{mail}/{psw}',[MailController::class, 'welcome_mail'])->name('welcome_mail');
    


require __DIR__ . '/auth.php';

    // // routes for dashboard
    // Route::get('admin-dashboard',[DashboardController::class, 'index'])->name('dashboard');
    
     Route::get('doctor-dashboard',[DashboardController::class, 'doctor_dashboard'])->name('dashboard2');
    
     Route::get('Assistance-dashboard',[DashboardController::class,'assistance_dashboard'])->name('dashboard3');

     Route::get('admin-dashboard',[DashboardController::class, 'index'])->middleware('auth', 'admin'); //call the middleware


 