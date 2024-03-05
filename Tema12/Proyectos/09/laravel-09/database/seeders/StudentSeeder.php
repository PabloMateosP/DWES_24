<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('students')->insert([
            [
                'name' => 'Pablo',
                'last_name' => 'Mateos Palas',
                'birth_date' => '1885/05/01',
                'phone' =>  '639874563',
                'email' => 'pablo@gmail.com',
                'dni' =>  '12345678A',
                'city' =>  'Madrid',
                'course_id' => 1
            ]
        ]);
    }
}
