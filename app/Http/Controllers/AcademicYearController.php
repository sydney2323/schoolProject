<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicYear;

class AcademicYearController extends Controller
{
    public function index(){
        $academicYears = AcademicYear::all();
        return view('admin.academic_year.index',compact('academicYears'));
    }

    public function create(){
        return view('admin.academic_year.create');
    }

    public function store(Request $request){

        $academicYear = request()->validate([
            'academic_year' => 'required|unique:academic_years',
            'status' => 'nullable'
        ]);

        $checkActiveStatus = AcademicYear::where('status', '=', 1)->first();
        if ($checkActiveStatus != null && $request->status == 1) {
            return back()->with('warning','Only one accademic Year can be Active.');
        }

        AcademicYear::create($academicYear);

        return redirect('/admin/academic-year');
    }

    public function edit($id)
    {
        $academicYear = AcademicYear::findOrFail($id);
        return view('admin.academic_year.edit',compact('academicYear'));
    }

    public function update(Request $request){
        // dd($request->id);
        $academicYear2 = AcademicYear::findOrFail($request->id);
        $academicYear = request()->validate([
            'academic_year' => 'required|unique:academic_years,academic_year,'.$request->id.'',
            'status' => 'nullable'
        ]);

        $checkActiveStatus = AcademicYear::where('status', '=', 1)->first();
        if ($checkActiveStatus != null && $request->status == null) {
            $academicYear = ['status' => 0];
            $academicYear2->update($academicYear);
            return redirect('/admin/academic-year');
        }elseif ($checkActiveStatus != null && $request->status == 1) {
            return back()->with('warning','Only one accademic Year can be Active.');
        }else {
            $academicYear2->update($academicYear);
            return redirect('/admin/academic-year');
        }

       
    }

    public function destroy($id)
    {
        $academicYear = AcademicYear::findOrFail($id);
        $academicYear->delete();
        return redirect('/admin/academic-year');
    }
}
