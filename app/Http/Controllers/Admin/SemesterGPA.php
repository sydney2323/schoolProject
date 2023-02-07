<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Student;
use App\Models\Module;
use App\Models\AcademicYear;
use DB;

class SemesterGPA extends Controller
{
    public function createSemester_1(Request $request){

        $academicYear2 = AcademicYear::findOrFail($request->academic_year);
        // $module = Module::where('semester', '=', 'I')
        //          ->orWhere('semester', '=', 'III')
        //          ->orWhere('semester', '=', 'V')
                 
        //          ->get()
        //          ->groupBy('semester');

        $module = Result::join('modules', 'results.module_id', '=', 'modules.id')
        ->get();   
              
        // $module = Module::all();

        dd($module);
        // $module = DB::table('modules')
        //     ->select('semester')
        //     ->groupBy('semester')
        //     ->get();    

        // $module = Module::all()
        //     ->groupBy('semester'); 
            // dd($module);

    }
}
