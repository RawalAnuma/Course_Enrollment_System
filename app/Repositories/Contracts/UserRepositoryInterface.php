<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function getAll(): Collection;

    public function getTeachers(): Collection;

    public function getStudents(): Collection;
}