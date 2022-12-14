<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Student;
use App\Models\Staff;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('index');
    }

    public function index2(){
        $modules = Module::count();
        $students = Student::count();
        $staffs = Staff::count();
        return view('index2',compact('modules','students','staffs'));
    }

    public function index3(){
        return view('index3');
    }

    public function login(){
        // $modules = Module::all();
        return view('login');
    }
}
