<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Guardian;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guardian>
 */
class GuardianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Guardian::class;
    public function definition(): array
    {
        return [
            'name'   => $this->faker->name(),
            'email'  => $this->faker->unique()->safeEmail(),
            'phone'  => $this->faker->phoneNumber(),
            'job'    => $this->faker->randomElement([
                'Web Developmet',
                'Mobile Development',
                'Informatika',
                'Game Development',
                'IoT'
            ]),
            'address' => $this->faker->city(),
        ];
    }
}
