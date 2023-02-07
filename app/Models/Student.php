<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;
    protected $guard = 'student';
    protected $fillable = [
        'reg_no', 'f_name', 'l_name', 'email', 'contact', 'level', 'programe','password'
    ];
    protected $hidden = [
        'password',
    ];

}
