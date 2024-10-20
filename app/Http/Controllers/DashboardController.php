<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
   

class DashboardController extends Controller
{
    public function index(){
        return view('Admin_Dashboard.dashboard');
    }
    public function Doctor_Dashboard(){
        return view('Doctor_Dashboard.dashboard');
    }
    public function Assistance_Dashboard(){
        return view('Assistance_Dashboard.dashboard');
    }

}

