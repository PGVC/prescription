<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assisteant extends Model
{
    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'experience',
        'highest_edu'
    ];
}
