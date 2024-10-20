<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'user_id',
        'nic',
        'address',
        'phone',
        'work_place',
        'specialization',
        'experience',
        'highest_edu'
    ];
}
