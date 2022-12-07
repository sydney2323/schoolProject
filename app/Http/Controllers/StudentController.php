<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        return view('student.index',compact('students'));
    }

    public function create(){
        return view('student.create');
    }

    public function store(Request $request){
        Student::create(request()->validate([
            'reg_no' => 'required',
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'level' => 'required',
            'programe' => 'required'
        ]));

        return redirect('/student');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit',compact('student'));
    }

    public function update(Request $request){
        // dd($request->id);
        $student = Student::findOrFail($request->id);
        $student->update(request()->validate([
            'reg_no' => 'required',
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'level' => 'required',
            'programe' => 'required'
        ]));

        return redirect('/student');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('/student');
    }
}
