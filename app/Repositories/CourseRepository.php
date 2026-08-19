<?php

namespace App\Repositories;

use App\Models\Course;
use App\Repositories\Contracts\CourseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CourseRepository implements CourseRepositoryInterface
{
    public function getAll(): Collection
    {
        return Course::all([
            'id',
            'course_name',
            'course_id',
            'credit_hours',
            'leader_id',
            'description',
            'status',
        ]);
    }

    public function create(array $data): Course
    {
        return Course::create($data);
    }

    public function update(Course $course, array $data): bool
    {
        return $course->update($data);
    }

    public function delete(Course $course): bool
    {
        return $course->delete();
    }
}