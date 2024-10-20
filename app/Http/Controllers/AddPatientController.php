<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddPatient; 

class AddPatientController extends Controller
{
    //Display the booking form
    public function create()
    {
        //dd('test');
        return view('patient');
    }
    //handle the  form submission
    public function store(Request $request)
    {
        
    //Validate the form data
    // $request->validate([
    //     'patienname' => 'required|string|max:255',
    //     'email' => 'required|email',
    //     'con_num' => 'required|string',
    //     'booking_date' => 'required|date',
    //     'booking_time' => 'required',
    //     'symtoms' => 'nullable|string',

    // ]);   

    // dd($request);
    //Store addpatient in the database
    $addpatient = new AddPatient();
    $addpatient->patient_name = $request->patient_name;
    $addpatient->patient_nic = $request->patient_nic;
    $addpatient->age = $request->age;    
    $addpatient->con_num = $request->con_num;
    $addpatient->weight = $request->weight;
    $addpatient->email = $request->email;
    $addpatient->location_id = 1;
    $addpatient->doctor_id = 1;
    $addpatient->save();

    
    //Redirect with a success message
    return redirect()->back()->with('success', 'Booking successfully made!');
    }

    
}
