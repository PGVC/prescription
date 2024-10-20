<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'patienname',
        'con_num',
        'age',
        'date',
        'time',
        'symtoms',
        'doctor_id',
        'location_id',
        ];
}
