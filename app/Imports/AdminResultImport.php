<?php

namespace App\Imports;

use App\Models\Result;
use App\Models\Student;
use App\Models\AcademicYear;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Concerns\WithUpsertColumns;
use Illuminate\Support\Facades\Validator;

use Auth;
  

class ResultImport implements  ToCollection, WithHeadingRow
{
    public function __construct($module_id, $level, $programe,)
    {
        $this->module_id = $module_id;
        $this->level = $level;
        $this->programe = $programe;
    }

   
    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.reg_no' => 'required',
        ])->validate();
        $checkActiveAcademicYear = AcademicYear::where('status', '=', 1)->first();
        if ($checkActiveAcademicYear) {
            foreach ($rows as $row) 
            {  
                $student = Student::where('reg_no', $row['reg_no'])->first();
                if ($student) {
                    Result::updateOrCreate(
                        [
                            'academic_year' => $checkActiveAcademicYear->academic_year,
                            'reg_no'         => $row['reg_no'], 
                            'module_id'      => $this->module_id, 
                        ],
                        [
                        'academic_year' => $checkActiveAcademicYear->academic_year,
                        'reg_no'         => $row['reg_no'], 
                        'staff_id'       => Auth::guard('staff')->user()->id,
                        'module_id'      => $this->module_id, 
                        'cat_1'          => $row['cat_1'], 
                        'cat_2'          => $row['cat_2'], 
                        'assignment_1'   => $row['assignment_1'], 
                        'assignment_2'   => $row['assignment_2'], 
                    ]);
                }
               
            }
        }

        
    }


}
