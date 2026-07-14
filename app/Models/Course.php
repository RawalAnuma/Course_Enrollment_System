<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'course_name',
    'course_id',
    'credit_hours',
    'leader_id',
    'status',
    'start_date',
    'end_date',
    'description',
])]
class Course extends Model
{
    public function leader(){
        return $this->belongsTo(User::class, 'leader_id');
    }

    public function enrollments(){
        return $this->hasMany(CourseEnrollment::class);
    }

    public function students(){
        return $this->belongsToMany(User::class, 'course_enrollments', 'course_id', 'user_id')->withPivot('status', 'enrolled_at', 'completed_at')->withTimestamps();
    }
}
