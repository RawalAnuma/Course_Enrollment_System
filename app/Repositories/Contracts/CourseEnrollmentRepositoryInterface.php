<?php

namespace App\Repositories\Contracts;

use App\Models\CourseEnrollment;
use Illuminate\Database\Eloquent\Collection;

interface CourseEnrollmentRepositoryInterface
{
    public function getAll(): Collection;

    public function create(array $data): CourseEnrollment;

    public function update(
        CourseEnrollment $enrollment,
        array $data
    ): bool;

    public function delete(CourseEnrollment $enrollment): bool;
}