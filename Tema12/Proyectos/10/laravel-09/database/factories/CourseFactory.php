<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Course::class;
    public function definition(): array
    {
        return [
            'course' => fake()->randomElement(['1DAW', '2DAW', '1AD', '2AD', '1SMR', '2SMR', '1ASIR', '2ASIR']),
            'stage' => fake()->randomElement(['Desarrollo Aplicaciones Web', 'Diseño Gráfico', 'Bases de Datos', 'Asistencia a la direccion']),
        ];
    }
}
