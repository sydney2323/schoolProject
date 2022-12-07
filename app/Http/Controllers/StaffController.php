<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    public function index(){
        $staffs = Staff::all();
        return view('staff.index',compact('staffs'));
    }

    public function create(){
        return view('staff.create');
    }

    public function store(Request $request){
        Staff::create(request()->validate([
            'staff_id' => 'required',
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required',
            'contact' => 'required'
        ]));

        return redirect('/staff');
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.edit',compact('staff'));
    }

    public function update(Request $request){
        // dd($request->id);
        $staff = Staff::findOrFail($request->id);
        $staff->update(request()->validate([
            'staff_id' => 'required',
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required',
            'contact' => 'required'
        ]));

        return redirect('/staff');
    }

    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();
        return redirect('/staff');
    }
}
