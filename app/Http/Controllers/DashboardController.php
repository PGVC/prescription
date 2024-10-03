<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin(){
        return view('Admin_Dashboard.add_doctor');
    }
    public function doctor_dashboard(){
        return view('Doctor_Dashboard.dashboard');
    }
    public function assistance_dashboard(){
        return view('Assistance_Dashboard.dashboard');
    }

}

