<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        return view('admin.student.index',compact('students'));
    }

    public function create(){
        return view('admin.student.create');
    }

    public function store(Request $request){
        $student = request()->validate([
            'reg_no' => 'required|unique:students',
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'level' => 'required',
            'programe' => 'required'
        ]);

        $student["password"] =  Hash::make('welcome123');

        Student::create($student);

        return redirect('/admin/student');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.student.edit',compact('student'));
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

        return redirect('/admin/student');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('/admin/student');
    }
}
