<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
// use Maatwebsite\Excel\Concerns\FromQuery;
// use Maatwebsite\Excel\Concerns\Exportable;

class ResultCustomizedExport implements WithHeadings, FromCollection
{
    // use Exportable;

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
        // return Student::query()->where('level', '=', $this->level)->where('programe', '=', $this->programe)->get();
        return Student::select("reg_no", "f_name", "l_name")->where('level', '=', $this->level)->where('programe', '=', $this->programe)->get();
        // dFromQueryd($check);
    }

    public function headings(): array
    {
        return ["reg_no", "f_name", "l_name", "cat_1",  "cat_2", "assignment_1", "assignment_2", ];
    }
}
