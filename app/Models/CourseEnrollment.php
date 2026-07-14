<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['course_id', 'user_id', 'status','enrolled_at','completed_at',])]

class CourseEnrollment extends Model
{
    public function student(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
