<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Student;
use App\Models\Staff;
use App\Models\Result;
use Auth;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        return view('welcome');
    }

    public function admin(){
        $modules = Module::count();
        $students = Student::count();
        $staffs = Staff::count();
        return view('admin.index',compact('modules','students','staffs'));
    }

    public function staff(){
        $staff_id = Auth::guard('staff')->user()->id; 
        $assigned_modules = Module::where('assigned_staff', '=', $staff_id)->get();
        return view('staff.index',compact('assigned_modules'));
    }

    public function student(){
        $results = Result::where('reg_no', '=', Auth::guard('student')->user()->reg_no)->get();
        return view('student.index',compact('results'));
        }

}
