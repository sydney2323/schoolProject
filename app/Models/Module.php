<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable = [
        'code', 'name', 'level', 'programe', 'credit', 'assigned_staff'
    ];


}
