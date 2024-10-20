<?php

namespace App\Http\Controllers;

use App\Models\AddBooking;    
use Illuminate\Http\Request;
    
use Illuminate\Support\Facades\Hash;

class AddBookingController extends Controller
{
    //Display the booking form
    public function create()
    {
        //dd('test');
        return view('bookings');
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
    //Store booking in the database
    $booking = new AddBooking();
    $booking->patienname = $request->patientname;
    $booking->con_num = $request->contact_num;
    $booking->age = $request->age;    
    $booking->date = $request->booking_date;
    $booking->time = $request->booking_time;
    $booking->symtoms = $request->Symptoms;
    $booking->location_id = 1;
    $booking->doctor_id = 1;
    $booking->save();

    
    //Redirect with a success message
    return redirect()->back()->with('success', 'Booking successfully made!');
    }

   
    
}