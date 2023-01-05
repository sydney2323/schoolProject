<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ResultExport;
use App\Exports\ResultCustomizedExport;
use App\Imports\ResultImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Result;
use App\Models\Student;
use App\Models\Module;
use App\Models\AcademicYear;
use Auth;


class ResultsController extends Controller
{   
    
    public function export() 
    {
        return Excel::download(new ResultExport, 'result.xlsx');
        // return back()->withSuccess('Export started!');
    }

    public function customizedTemp(Request $request) 
    {
        $validate = request()->validate([
            'level' => 'required',
            'programe' => 'required'
        ]);
        // dd($request->level, $request->programe);
        // return (new ResultCustomizedExport($request->level, $request->programe))->download('invoices.xlsx');
        return Excel::download(new ResultCustomizedExport($request->level, $request->programe), 'result-'.$request->level.'-'.$request->programe.'.xlsx');
        //  return redirect('/staff/result')->with('success','Download has started!');
    }
       
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {
        $validate = request()->validate([
            'module_id' => 'required',
            'file' => 'required'
        ]);

        // $path = $request->file('mcafile')->getRealPath();
        // Excel::import(new ResultImport,$path);
        Excel::import(new ResultImport($request->module_id),$request->file('file'));
               
        return back()->with('success','Uploaded Successfull.');
    }

    public function index(){
        $staff_id = Auth::guard('staff')->user()->id; 
        
        $modules = Module::where('assigned_staff', '=', $staff_id)->get();
        $results = Result::where('staff_id', '=', $staff_id)->get();
        return view('staff.results.index',compact('results','modules'));
    }

    public function create(){
        //used to show module assigned to a staff
        $staff_id =  Auth::guard('staff')->user()->id;
        $modules = Module::where("assigned_staff", $staff_id)->get();

        return view('staff.results.create',compact('modules'));
    }

    public function fetchRegNo(Request $request)
    {
        $data['reg_no'] = Student::where("level", $request->level)->where("programe", $request->programe)
                                ->get(["reg_no"]);
  
        return response()->json($data);
    }

    public function store(Request $request){
        $result = request()->validate([
            'reg_no' => 'required',
            'module_id' => 'required',
            'cat_1' => 'required',
            'cat_2' => 'required',
            'assignment_1' => 'required',
            'assignment_2' => 'required'
        ]);

        $activeStatusAcademicYear = AcademicYear::where('status', '=', 1)->first();

        if ($activeStatusAcademicYear == null) {
            return back()->with('warning','Accademic year is not Active or not Created');
        }

        $result["staff_id"] =  2323;
        // $result["staff_id"] =  Auth::guard('staff')->user()->staff_id;
        $result["academic_year"] =  $activeStatusAcademicYear->academic_year;

        Result::create($result);

        return redirect('/staff/result')->with('success','Created Successfull.');
    }

    public function edit($id)
    {
        $result = Result::findOrFail($id);
        return view('staff.results.edit',compact('result'));
    }

    public function update(Request $request){

        $result = Result::findOrFail($request->id);
        $result->update(request()->validate([
            'cat_1' => 'required',
            'cat_2' => 'required',
            'assignment_1' => 'required',
            'assignment_2' => 'required'
        ]));

        return redirect('/staff/result')->with('success','Updated Successfull.');
    }

    public function destroy($id)
    {
        $result = Result::findOrFail($id);
        $result->delete();
        return redirect('/staff/result')->with('success','Deleted.');
    }


}
