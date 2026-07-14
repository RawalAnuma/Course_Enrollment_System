<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'course_name' => 'Introduction to Laravel',
                'course_id' => 'LAR101',
                'credit_hours' => 3,
                'leader_id' => 1,
                'status' => true,
                'start_date' => '2026-08-01',
                'end_date' => '2026-10-31',
                'description' => 'Introduction to Laravel framework and MVC concepts.',
            ],
            [
                'course_name' => 'Advanced PHP',
                'course_id' => 'PHP201',
                'credit_hours' => 4,
                'leader_id' => 1,
                'status' => true,
                'start_date' => '2026-09-01',
                'end_date' => '2026-12-15',
                'description' => 'Advanced PHP programming and design patterns.',
            ],
        ];

        foreach ($courses as $course) {
            Course::updateOrCreate(
                [
                    'course_id' => $course['course_id']
                ],
                $course
            );
        }
    }
}
