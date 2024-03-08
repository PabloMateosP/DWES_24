<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' =>  fake()->firstName(),
            'last_name' => fake()->lastName(),
            'birth_date' => fake()->date(),
            'phone' =>  fake()->unique()->e164PhoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'dni' =>  fake()->unique()->regexify('\d{8}[trwagmyfpdxbnjzsqvhlcke]'),
            'city' =>  fake()->city(),
            'course_id' => fake()->randomNumber(1 , 100)
        ];
    }
}
