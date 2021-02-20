<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class Customer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $student = [
                    [
                      'name'=>'Jogi',
                      'lastname'=>'Singh',
                    ],
                    [
                      'name'=>'Jonty',
                      'lastname'=>'Singh',
                    ],
                    [
                      'name'=>'Harsh',
                      'lastname'=>'Srivastav',
                    ],
               
                   ];

        foreach ($student as $key => $value) {
            Student::create($value);
        }
    }
}
