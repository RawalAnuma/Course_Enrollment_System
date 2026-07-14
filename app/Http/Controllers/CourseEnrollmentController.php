<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\User;
use App\Models\CourseEnrollment;
use Illuminate\Http\Request;

class CourseEnrollmentController extends Controller
{
    public function index(){
        $enrollments = CourseEnrollment::get();
        return view('enrollments.index', compact('enrollments'));
    }

    public function create(Course $course){
        $students = User::where('role', 'student')->get();
        return view('enrollments.create', compact('course', 'students'));
    }


    public function store(Request $request){
        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|boolean',
            'completed_at' => 'nullable|date|after_or_equal:enrolled_at',
        ]);

        $validatedData['enrolled_at'] = now();

        CourseEnrollment::create($validatedData);

        toastr()->success('Enrollment created successfully!');
        return redirect()->route('enrollments.index');
    }


    public function edit($id){
        $enrollment = CourseEnrollment::findOrFail($id);
        $courses = Course::all();
        $students = User::where('role', 'student')->get();
        return view('enrollments.edit', compact('enrollment', 'courses', 'students'));
    }

    public function update(Request $request, $id){
        $enrollment = CourseEnrollment::findOrFail($id);
        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|boolean',
            'completed_at' => 'nullable|date|after_or_equal:enrolled_at',
        ]);

        $enrollment->update($validatedData);
        toastr()->success('Enrollment updated successfully!');
        return redirect()->route('enrollments.index');
    }


    public function delete($id){
        try{
            CourseEnrollment::where('id', $id)->delete();
            toastr()->success('Enrollment has been deleted successfully!');
        }catch(Exception $ex){
            toastr()->error('An error occurred while deleting the enrollment.');
        }
        return redirect()->route('enrollments.index');
    }
}
