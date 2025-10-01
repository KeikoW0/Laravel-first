<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Guardian;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->call(GuardianSeeder::class);
        $this->call(ClassroomSeeder::class);
    }
}
