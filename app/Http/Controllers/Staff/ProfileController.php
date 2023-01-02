<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function staffProfile(){
        $staff = Auth::guard('staff')->user(); 
        return view('staff.profile',compact('staff'));
    }

    public function staffProfileEdit(Request $request){
        $id = Auth::guard('staff')->user()->id; 
        $staff = Staff::find($id);
        $staff->update($request->all());
        return redirect('/staff/profile');
    }

    public function staffProfileChangePassword(Request $request){
        $this->validate($request, [
            "current_password" => "required",
            "password" => 'required|confirmed|min:6' 
        ]);

        $id = Auth::guard('staff')->user()->id; 
        $staff = Staff::find($id);

        if (Hash::check($request->current_password, $staff->password)) {
            $staff->update([
                "password" => Hash::make($request->password)
            ]);
            return redirect('/staff/profile')->with('success','Password changed successfully');;
        }
        return redirect('/staff/profile')->with('warning','Wrong current password');;
    }
}
