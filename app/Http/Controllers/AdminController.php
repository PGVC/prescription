<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function add_doctor(Request $request)
    {
        // dd($request);
        $doctor = new Doctor();
        $doctor->user_id = Auth::id();
        $doctor->nic = $request->nic;
        $doctor->address = $request->address;
        $doctor->phone = $request->phone;
        $doctor->work_place = $request->work_place;
        $doctor->specialization = $request->specialization;
        $doctor->experience = $request->experience;
        $doctor->highest_edu = $request->highest_edu;
        $doctor->save();

        // Function to generate a random password
        function generateRandomPassword($length = 8)
        {
            // Define the characters to use for generating the password
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';

            // Generate a random password
            $password = '';
            for ($i = 0; $i < $length; $i++) {
                $password .= $characters[mt_rand(0, strlen($characters) - 1)];
            }

            return $password;
        }
        
        // Generate a random password
        $psw = generateRandomPassword(8);
        Log::alert('doctor pasword'.$psw);

        $user = new User();
        $user->name = $request->doctor_name;
        $user->email = $request->email;
        $user->user_roll = 'doctor';
        $user->password = Hash::make($psw);
        $user->save();

        return redirect()->back();
    }
}
