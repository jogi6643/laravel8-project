<?php

namespace App\Imports;
use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\withHeadingRow;

class StudentImport implements ToModel,withHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Student([
            'name'=>$row['name'],
            'lastname'=>$row['lastname'],
        ]);
    }
}
