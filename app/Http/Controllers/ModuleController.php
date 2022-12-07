<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;

class ModuleController extends Controller
{
    public function index(){
        $modules = Module::all();
        return view('module.index',compact('modules'));
    }

    public function create(){
        return view('module.create');
    }

    public function store(Request $request){
        Module::create(request()->validate([
            'code' => 'required',
            'name' => 'required',
            'level' => 'required',
            'programe' => 'required'
        ]));

        return redirect('/module');
    }

    public function edit($id)
    {
        $module = Module::findOrFail($id);
        return view('module.edit',compact('module'));
    }

    public function update(Request $request){
        // dd($request->id);
        $module = Module::findOrFail($request->id);
        $module->update(request()->validate([
            'code' => 'required',
            'name' => 'required',
            'level' => 'required',
            'programe' => 'required'
        ]));

        return redirect('/module');
    }

    public function destroy($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();
        return redirect('/module');
    }
}
