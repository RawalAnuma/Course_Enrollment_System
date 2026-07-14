<?php

namespace Database\Seeders;

use App\Models\CourseEnrollment;
use Illuminate\Database\Seeder;

class CourseEnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enrollments = [
            [
                'course_id' => 1,
                'user_id' => 2,
                'status' => true,
                'enrolled_at' => now(),
                'completed_at' => null,
            ],
            [
                'course_id' => 2,
                'user_id' => 2,
                'status' => true,
                'enrolled_at' => now(),
                'completed_at' => null,
            ],
        ];

        foreach ($enrollments as $enrollment) {
            CourseEnrollment::updateOrCreate(
                [
                    'course_id' => $enrollment['course_id'],
                    'user_id' => $enrollment['user_id'],
                ],
                $enrollment
            );
        }
    }
}