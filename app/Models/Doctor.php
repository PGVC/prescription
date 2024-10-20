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

    // Doctor.php
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Adjust 'user_id' if your foreign key is named differently
    }
}
