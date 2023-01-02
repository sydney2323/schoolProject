<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use Notifiable;

    protected $guard = 'staff';
    // protected $guarded = [];

    protected $fillable = [
        'staff_id', 'f_name', 'l_name', 'email', 'contact', 'password', 'about','is_admin', 'address', 'link', 'image'
    ];

    protected $hidden = [
        'password',
    ];

}
