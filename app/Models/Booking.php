<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'doctor_id',
        'patient_id',
        'center_name',
        'doctor_name',
        'date',
        'time',
        'status'
    ];
}
