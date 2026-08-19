<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(): Collection{
            return User::all([
            'id',
            'name',
            'email',
            'contact_number',
            'role',
            'status',
        ]);
    }

    public function getTeachers(): Collection{
        return User::where('role', 'teacher')->get();
    }

    public function getStudents(): Collection{
        return User::where('role', 'student')->get();
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(User $user, array $data): bool
    {
        return $user->update($data);
    }

    public function delete(User $user): bool
    {
        return $user->delete();
    }
}