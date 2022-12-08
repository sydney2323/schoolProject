<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Student;
use App\Models\Staff;

class AdminPanelController extends Controller
{
    public function index(){
        $modules = Module::count();
        $students = Student::count();
        $staffs = Staff::count();
        return view('index',compact('modules','students','staffs'));
    }

    public function login(){
        // $modules = Module::all();
        return view('login');
    }
}
