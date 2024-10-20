<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // public function Userregister(Request $request){
    //     $user = new User();
    //     $user->name = $request->d_name;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);
    //     $user->save();
       
    //     return view('Admin_Dashboard.add_doctor');
    // }

    public function register(Request $request)
    {
        // dd($request);
        //validaate the request data
        $request->validate([
            'd_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        // Create the new user
    $user = User::create([
        'name' => $request->d_name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    // dd($user);

    // Optionally, redirect or log the user in
    return view('Admin_Dashboard.dashboard')->with('success', 'Registration successful. Please log in.');
    }

    }  

