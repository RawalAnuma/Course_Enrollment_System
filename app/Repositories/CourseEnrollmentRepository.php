<?php

namespace App\Repositories;

use App\Models\CourseEnrollment;
use App\Repositories\Contracts\CourseEnrollmentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CourseEnrollmentRepository implements CourseEnrollmentRepositoryInterface
{
    public function getAll(): Collection
    {
        return CourseEnrollment::with([
            'student',
            'course.leader'
        ])->get();
    }

    public function create(array $data): CourseEnrollment
    {
        return CourseEnrollment::create($data);
    }

    public function update(
        CourseEnrollment $enrollment,
        array $data
    ): bool {
        return $enrollment->update($data);
    }

    public function delete(CourseEnrollment $enrollment): bool
    {
        return $enrollment->delete();
    }
}