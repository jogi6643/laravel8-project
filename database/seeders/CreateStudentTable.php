<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use Faker\Factory as Faker;
class CreateStudentTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // *****Data Using Manually*********
        // $student = [
        //             [
        //               'name'=>'Jogi',
        //               'lastname'=>'Singh',
        //             ],
        //             [
        //               'name'=>'Jonty',
        //               'lastname'=>'Singh',
        //             ],
        //             [
        //               'name'=>'Harsh',
        //               'lastname'=>'Srivastav',
        //             ],
               
        //            ];

        // foreach ($student as $key => $value) {
        //     Student::create($value);
        // }
        // *******End Data Manually*************
    //   *****************Data Dump Using Faker*******************
    $faker = Faker::create();
    foreach (range(1,100) as $key => $value) {
        Student::create(
            [
                'name'=>$faker->name,
                'lastname'=>$faker->lastname
            ]
            );
    }

    }
}
