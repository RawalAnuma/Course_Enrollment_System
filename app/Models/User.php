<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'contact_number', 'role', 'status', 'password', 'hash', 'image'])]
#[Hidden(['password', 'remember_token', 'hash'])]

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'status' => 'boolean',
        ];
    }

    public function enrollments(){
        return $this->hasMany(CourseEnrollment::class);
    }

    public function courses(){
        return $this->belongsToMany(Course::class, 'course_enrollments', 'user_id', 'course_id')->withPivot('status', 'enrolled_at', 'completed_at')->withTimestamps();
    }
}
