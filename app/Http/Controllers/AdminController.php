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
    public function show_doctors()
    {
        $doctors = Doctor::with('user')->paginate(10); // Get paginated list of doctors with their users

        // Retrieve unique admin IDs from the doctors collection using items()
        $adminIds = collect($doctors->items())->pluck('admin_id')->unique();

        // Fetch admins based on unique admin IDs
        $admins = User::whereIn('id', $adminIds)->get();

        return view('Admin_Dashboard.dashboard', compact('doctors', 'admins'));
    }
    public function add_doctor(Request $request)
    {
        // dd($request);
        // Validation rules
        // $request->validate([
        //     'doctor_name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email',
        //     'nic' => 'required|string|max:12',
        //     'address' => 'required|string|max:255',
        //     'phone' => 'required|string|max:12',
        //     'work_place' => 'nullable|string|max:255',
        //     'specialization' => 'nullable|string|max:255',
        //     'experience' => 'required|string',
        //     'highest_edu' => 'required|string|max:255',
        // ]);
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
        Log::alert('doctor pasword' . $psw);

        $user = new User();
        $user->name = $request->doctor_name;
        $user->email = $request->email;
        $user->user_roll = 'doctor';
        $user->password = Hash::make($psw);
        $user->save();

        $doctor = new Doctor();
        $doctor->user_id = $user->id;
        $doctor->admin_id = Auth::id();
        $doctor->nic = $request->nic;
        $doctor->address = $request->address;
        $doctor->phone = $request->phone;
        $doctor->work_place = $request->work_place;
        $doctor->specialization = $request->specialization;
        $doctor->experience = $request->experience;
        $doctor->highest_edu = $request->highest_edu;
        $doctor->save();
        return redirect()->back();
    }

    public function delete_doctor($id)
    {
        // Find the doctor by user ID
        $doctor = Doctor::where('user_id', $id)->first();
        $user = User::where('id', $id)->first();

        if ($doctor) {
            // Optionally log the action
            Log::info('Deleting doctor: ' . $doctor->user->name);

            // Delete the doctor record
            $doctor->delete();
            $user->delete();

            // Optionally delete the associated user
            User::destroy($id);

            // Flash success message
            return redirect()->back()->with('success', 'Doctor deleted successfully.');
        }

        // Flash error message if doctor not found
        return redirect()->back()->with('error', 'Doctor not found.');
    }

    public function update_doctor($id)
    {
        $doctor = Doctor::where('user_id', $id)->first();
        $user = User::where('id', $id)->first();
        return view('editdoctor', compact('doctor'));
    }

    public function save_doctor_update(Request $request, $id)
    {
        // Fetch the doctor record based on user_id (since doctor table is associated with user)
        $doctor = Doctor::where('user_id', $id)->firstOrFail();

        // Fetch the corresponding user record
        $user = User::findOrFail($id);
        // Update the user's name and email
        $user->name = $request->doctor_name;
        $user->email = $request->email;
        // dd($doctor, $user);
        $user->save();

        // Update the doctor record
        $doctor->nic = $request->nic;
        $doctor->address = $request->address;
        $doctor->phone = $request->phone;
        $doctor->work_place = $request->work_place;
        $doctor->specialization = $request->specialization;
        $doctor->experience = $request->experience;
        $doctor->highest_edu = $request->highest_edu;
        $doctor->save();

        // Redirect back to the dashboard or another page
        return redirect()->route('dashboard')->with('success', 'Doctor details updated successfully.');
    }
}
