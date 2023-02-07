<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Illuminate\Support\Facades\Validator;
use App\Models\Result;
use App\Models\Student;
use App\Models\Module;
use App\Models\AcademicYear;


class AdminResultCustomizeImport implements  ToCollection,WithHeadingRow
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
            '*.final_exam' => 'required|integer|max:100',
        ])->validate();

        $checkActiveAcademicYear = AcademicYear::where('status', '=', 1)->first();

        foreach ($rows as $row) 
        {
            $student = Student::where('reg_no', $row['reg_no'])->first();
            if ($student) {
                $result = Result::where('module_id', $this->module_id)
                    ->where('reg_no', $row['reg_no'])
                    ->where('academic_year', $checkActiveAcademicYear->academic_year)->first();
                    // calculateResult($result, $row['final_exam']);
                $methodResult = $this->calculateResult($result, $row['final_exam']);
                $result->update([
                    'final_exam' => $row['final_exam'],
                    'score' => $methodResult['score'],
                    'grade' => $methodResult['grade'],
                ]);
            }
           
        }
    }

    public function calculateResult($result, $final_exam){
        // $module = Module::where('module_id', $result->module_id);

        $cat1 = $result->cat_1; 
        $cat2 = $result->cat_2; 
        $ass1 = $result->assignment_1; 
        $ass2 = $result->assignment_2; 

        $score = ($ass1 + $ass2) + (($cat1 + $cat2)/100) * 20 + ($final_exam/100) * 60;
        $score = round($score);

        // if ($score >= 80 && $score <= 100) {
        //     $grade = 'A';
        // }
        // if ($score >= 65 && $score <= 79) {
        //     $grade = 'B';
        // }
        // if ($score >= 50 && $score <= 64) {
        //     $grade = 'C';
        // }
        // if ($score >= 40 && $score <= 49) {
        //     $grade = 'D';
        // }
        // if ($score >= 0 && $score <= 39) {
        //     $grade = 'F';
        // }

        if ($score >= 75 && $score <= 100) {
            $grade = 'A';
        } else if ($score >= 65 && $score <= 74) {
            $grade = 'B+';
        } else if ($score >= 55 && $score <= 64) {
            $grade = 'B';
        } else if ($score >= 45 && $score <= 54) {
            $grade = 'C';
        } else if ($score >= 35 && $score <= 44) {
            $grade = 'D';
        }else {
            $grade = 'F';
        }
        

        return [
            'score' => $score,
            'grade' => $grade,
        ];
    }

}
