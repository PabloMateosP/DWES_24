<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::table('courses')->insert(
        //     [
        //         'course' => '1DAW',
        //         'stage' => 'Desarrollo de Aplicaciones Web'
        //     ]
        // );

        // DB::table('courses')->insert(
        //     [
        //         'course' => '2DAW',
        //         'stage' => 'Desarrollo de Aplicaciones Web'
        //     ]
        // );

        // DB::table('courses')->insert(
        //     [
        //         'course' => '1AD',
        //         'stage' => 'Asistencia a la direccion'
        //     ]
        // );
        
        // DB::table('courses')->insert(
        //     [
        //         'course' => '2DAW',
        //         'stage' => 'Asistencia a la direccion'
        //     ]
        // );

        // DB::table('courses')->insert(
        //     [
        //         'course' => Str::random(20),
        //         'stage' => Str::random(15).'FP'
        //     ]
        // );

        // Añadir registros desde la factoria 
        $courses = Course::factory()->count(20)->create();

    }
}
