<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Student;

class AdminResultCustomizeExport implements FromCollection, WithHeadings
{

    public function __construct(string $level, string $programe)
    {
        $this->level = $level;
        $this->programe = $programe;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::select("reg_no", "f_name", "l_name")->where('level', '=', $this->level)
        ->where('programe', '=', $this->programe)
        ->get();
    }

    public function headings(): array
    {
        return ["reg_no", "f_name", "l_name", "final_exam" ];
    }
}
