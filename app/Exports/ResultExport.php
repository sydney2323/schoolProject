<?php

namespace App\Exports;

use App\Models\Result;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;

class ResultExport implements FromCollection, WithHeadings, FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Result::all();
        return Result::select("academic_year", "reg_no", "cat_1", "cat_2", "assignment_1", "assignment_2")->get();
    }

    public function headings(): array
    {
        return ["Academic", "Reg", "Cat1",  "Cat2", "Assignment1", "Assignment2", ];
    }
}
