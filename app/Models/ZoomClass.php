<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoomClass extends Model
{
    use HasFactory;
    protected $fillable = [
         'title',
         'desc', 
         'duration',
         'date', 
         'start_time',
         'end_time', 
         'staff_id',
         'end_time', 
         'start_url',
         'join_url',
         'password',
         'staff_id',
    ];
}
