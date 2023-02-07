<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Module;
use Illuminate\Support\Facades\Hash;
use Auth;
class StaffController extends Controller
{
    public function index(){
        $staffs = Staff::where('is_admin', '=', 0)->orWhere('is_admin', '=', 1)->get();
        // $staffs = Staff::all();
        return view('admin.staff.index',compact('staffs'));
    }

    public function create(){
        return view('admin.staff.create');
    }

    public function store(Request $request){
        $staff = request()->validate([
            'staff_id' => 'required|unique:staff',
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|unique:staff',
            'contact' => 'required'
        ]);

        $staff["password"] =  Hash::make('welcome123');

        Staff::create($staff);

        return redirect('/admin/staff');
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('admin.staff.edit',compact('staff'));
    }

    public function update(Request $request){
        // dd($request->id);
        $staff = Staff::findOrFail($request->id);
        $staff["password"] =  Hash::make('welcome123');
        $staff->update(request()->validate([
            'staff_id' => 'required',
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required',
            'contact' => 'required'
        ]));

        return redirect('/admin/staff');
    }

    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();
        return redirect('/admin/staff');
    }

    public function privilege(){
        $staffs = Staff::where('is_admin', '=', 0)->orWhere('is_admin', '=', 1)->get();
        return view('admin.staff.privilege',compact('staffs'));
    }


    public function privilegeAssign(Request $request){

        $staff = Staff::find($request->staff_id);

        if ($staff->is_admin == 0) {
            $staff->update([
                'is_admin' => 1
            ]);
            return response()->json(['success'=>'Assigned successfully.']);
        }elseif ($staff->is_admin == 1) {
            $staff->update([
                'is_admin' => 0
            ]);
            return response()->json(['success_2'=>'De-assigned successfully.']);
        }
    }
}
