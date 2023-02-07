<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Staff;

class ModuleController extends Controller
{
    public function index(){
        $modules = Module::all();
        $staffs = Staff::where('is_admin', '=', 0)->orWhere('is_admin', '=', 1)->get();
        // $staffs = Staff::all();
        return view('admin.module.index',compact('modules','staffs'));
    }

    public function create(){
        return view('admin.module.create');
    }

    public function store(Request $request){
        Module::create(request()->validate([
            'code' => 'required',
            'name' => 'required',
            'credit' => 'required',
            'level' => 'required',
            'semester' => 'required',
            'programe' => 'required'
        ]));

        return redirect('/admin/module');
    }

    public function edit($id)
    {
        $module = Module::findOrFail($id);
        return view('admin.module.edit',compact('module'));
    }

    public function update(Request $request){
        // dd($request->id);
        $module = Module::findOrFail($request->id);
        $module->update(request()->validate([
            'code' => 'required',
            'name' => 'required',
            'credit' => 'required',
            'level' => 'required',
            'semester' => 'required',
            'programe' => 'required'
        ]));

        return redirect('/admin/module');
    }

    public function assign(Request $request){
        
        $module = Module::find($request->module_id);
        $staff = Staff::find($request->staff_id);

        if ($staff != null && $module != null) {
            $module->update([
                'assigned_staff' => $request->staff_id
            ]);

            return response()->json(['success'=>'Assigned successfully.']);
        }

        return response()->json(['warning'=>'Not assigned. Staff id or Module id is wrong.']);
    }

    public function destroy($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();
        return redirect('/admin/module');
    }
}
