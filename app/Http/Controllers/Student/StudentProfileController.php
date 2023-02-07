<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Auth;
use Illuminate\Support\Facades\Hash;

class StudentProfileController extends Controller
{
    public function profile(){
        $student = Auth::guard('student')->user(); 
        return view('student.profile',compact('student'));
    }

    public function profileEdit(Request $request){
        $id = Auth::guard('staff')->user()->id; 
        $staff = Student::find($id);
        $staff->update($request->all());
        return redirect('/staff/profile');
    }

    public function profileChangePassword(Request $request){
        $this->validate($request, [
            "current_password" => "required",
            "password" => 'required|confirmed|min:6' 
        ]);

        $id = Auth::guard('staff')->user()->id; 
        $staff = Student::find($id);

        if (Hash::check($request->current_password, $staff->password)) {
            $staff->update([
                "password" => Hash::make($request->password)
            ]);
            return redirect('/staff/profile')->with('success','Password changed successfully');;
        }
        return redirect('/staff/profile')->with('warning','Wrong current password');;
    }

}
