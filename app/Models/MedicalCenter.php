<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalCenter extends Model
{
    protected $fillable = [
        'doctor_id',
        'center_name',
        'address',
        'phone',
        'open_time',
        'close_time',
        'status'
    ];
}
