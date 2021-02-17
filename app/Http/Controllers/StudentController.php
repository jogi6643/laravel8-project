<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;
use App\Models\Student;
use Excel;
use App\Imports\StudentImport;
class StudentController extends Controller
{
    public function insertRecord()
    {
    $phone = new Phone();
    $phone->phone = '1234567890';
    $student = new Student();
    $student->name = "New Jogi";
    $student->lastname = "New Last";
    $student->save();
    $student->phone()->save($phone);
    return "Record Add Succesfully...";
    }

    public function getStudent()
    {
        // $phone = Phone::find(1);
        // // dd($phone);
        // return $phone->user;
        $student = Student::find(104);
        // dd($phone);
        return $student->phone;
    }


    public function importForm()
    {
        return view('import-form');
    }
    public function importcsv(Request $request)
    {
        // dd($request->file);
        Excel::import(new StudentImport,$request->file);
        return "Record added SuccessFully";
    }
}
