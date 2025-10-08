<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Guardian;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Teacher;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Teacher::factory(5)->create();
        Subject::factory(4)->hasTeacher(5)->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'description' => 'This is a test user.',
        ]);
        $this->call(GuardianSeeder::class);
        $this->call(ClassroomSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(TeacherSeeder::class);
    }
}
