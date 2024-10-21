<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function welcome_mail($username, $mail, $psw){
        // dd($mail);
        $maildata = [
            'title' => 'Welcome Prescription System',
            'user' => $mail,
            'psw' => $psw,
        ];
        // dd($maildata);
        Mail::to($mail)->send(new WelcomeMail($maildata, $username));

        return redirect()->route('dashboard');
    }
}
