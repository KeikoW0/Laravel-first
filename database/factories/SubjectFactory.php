<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Subject;
use App\Models\Teacher;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Subject::class;
    public function definition(): array
    {
        return [
            //
            'name'    => $this->faker->randomElement([
                'Web Developmet',
                'Mobile Development',
                'Informatika',
                'Game Development',
                'IoT'
            ])->unique(),
            'description' => $this->faker->sentence(),
        ];
    }
}
