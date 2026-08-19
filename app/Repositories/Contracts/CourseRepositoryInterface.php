<?php

namespace App\Repositories\Contracts;

use App\Models\Course;
use Illuminate\Database\Eloquent\Collection;

interface CourseRepositoryInterface
{
    public function getAll(): Collection;

    public function create(array $data): Course;

    public function update(Course $course, array $data): bool;

    public function delete(Course $course): bool;
}