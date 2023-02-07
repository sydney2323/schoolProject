<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Result;
use App\Models\Student;
use App\Models\Module;
use App\Exports\AdminResultCustomizeExport;
use App\Imports\AdminResultCustomizeImport;
use App\Models\AcademicYear;
use Maatwebsite\Excel\Facades\Excel;
use Auth;

class AdminResultsController extends Controller
{
    public function index(){
        $results = Result::all();
        $modules = Module::all();
        return view('admin.results.index',compact('results','modules'));
    }

    public function destroy($id)
    {
        $module = Result::findOrFail($id);
        $module->delete();
        return redirect('/admin/result');
    }

    public function fetchRegNo(Request $request)
    {
        $data['reg_no'] = Student::where("level", $request->level)->where("programe", $request->programe)
                                ->get(["reg_no"]);
  
        return response()->json($data);
    }

    public function storeFinalExam(Request $request)
    {
        $result = Result::find($request->id);
        $result->update([
            'final_exam' => $request->value
        ]);                       
  
        return response()->json([
            'success'  =>  'Added successfully.',
            'value'    =>  $request->value
        ]);
    }

    public function customizedTemp(Request $request) 
    {
        $validate = request()->validate([
            'level' => 'required',
            'programe' => 'required'
        ]);
        return Excel::download(new AdminResultCustomizeExport($request->level, $request->programe), 'admin-final-exam-result-upload-'.$request->level.'-'.$request->programe.'.xlsx');
        
    }

    public function import(Request $request) 
    {
        $validate = request()->validate([
            'module_id' => 'required',
            'file' => 'required|mimes:xlsx'
        ]);

        // $path = $request->file('mcafile')->getRealPath();
        // Excel::import(new AdminResultCustomizeImport,$path);
        Excel::import(new AdminResultCustomizeImport($request->module_id,$request->level,$request->programe),$request->file('file'));
               
        return back()->with('success','Exams uploaded Successfull.');
    }

}
