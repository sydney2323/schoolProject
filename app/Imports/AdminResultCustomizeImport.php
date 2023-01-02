<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Illuminate\Support\Facades\Validator;
use App\Models\Result;
use App\Models\Student;


class AdminResultCustomizeImport implements  ToCollection,WithHeadingRow
{

    public function __construct(int $module_id)
    {
        $this->module_id = $module_id;
    }

    public function collection(Collection $rows)
    {
            //     Validator::make($rows->toArray(), [
    //         '*.name' => 'required',
    //         '*.email' => 'required',
    //         '*.password' => 'required',
    //     ])->validate();
 
    //    foreach ($rows as $row) {
    //        User::create([
    //            'name' => $row['name'],
    //            'email' => $row['email'],
    //            'password' => bcrypt($row['password']),
    //        ]);
    //    }

        //$staff_id =  Auth::guard('staff')->user()->staff_id;
        // return new Result([
        //     'final_exam'   => $row['final_exam'], 
        // ]);
        foreach ($rows as $row) 
        {
            // User::create([
            //     'name' => $row[0],
            // ]);
            $student = Student::where('reg_no', $row['reg_no'])->first();
            if ($student) {
                Result::where('module_id', $this->module_id)
                ->update(['final_exam' => $row['final_exam']]);
            }
           
        }
    }

}
