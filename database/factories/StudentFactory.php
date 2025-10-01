<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Classroom;

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
            'name' => $this->faker->name(),
            'brithday' => $this->faker->date(),
            'email' => $this->faker->unique()->safeEmail(),
            'classroom_id' => Classroom::factory(),
            'address' => $this->faker->city(),
        ];
    }
}
