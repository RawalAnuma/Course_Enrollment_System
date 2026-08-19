<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\User;
use App\Models\CourseEnrollment;
use Illuminate\Http\Request;
use Exception;

use App\Repositories\Contracts\CourseRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\CourseEnrollmentRepositoryInterface;

class CourseEnrollmentController extends Controller
{
    private CourseEnrollmentRepositoryInterface $enrollmentRepository;
    private CourseRepositoryInterface $courseRepository;
    private UserRepositoryInterface $userRepository;

    public function __construct(
        CourseEnrollmentRepositoryInterface $enrollmentRepository,
        CourseRepositoryInterface $courseRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->enrollmentRepository = $enrollmentRepository;
        $this->courseRepository = $courseRepository;
        $this->userRepository = $userRepository;
    }

    public function index(){
        $enrollments = $this->enrollmentRepository->getAll();
        return view('enrollments.index', compact('enrollments'));
    }

    public function create(Course $course){
        $students = $this->userRepository->getStudents();
        return view('enrollments.create', compact('course', 'students'));
    }


    public function store(Request $request){
        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|boolean',
            'completed_at' => 'nullable|date',
        ]);

        $validatedData['enrolled_at'] = now();

        $this->enrollmentRepository->create($validatedData);

        toastr()->success('Enrollment created successfully!');
        return redirect()->route('enrollments.index');
    }

    public function show(CourseEnrollment $enrollment)
    {
        $enrollment->load(['student', 'course.leader']);

        return view('enrollments.show', compact('enrollment'));
    }


    public function edit(CourseEnrollment $enrollment){
        $courses = $this->courseRepository->getAll();
        $students = $this->userRepository->getStudents();

        return view('enrollments.edit', compact('enrollment', 'courses', 'students'));
    }

    public function update(Request $request, CourseEnrollment $enrollment){
        
        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|boolean',
            'completed_at' => 'nullable|date',
        ]);

        $this->enrollmentRepository->update($enrollment,
            $validatedData);
        toastr()->success('Enrollment updated successfully!');
        return redirect()->route('enrollments.index');
    }


    public function destroy(CourseEnrollment $enrollment){
        try{
            $this->enrollmentRepository->delete($enrollment);
            toastr()->success('Enrollment has been deleted successfully!');
        }catch(Exception $ex){
            toastr()->error('An error occurred while deleting the enrollment.');
        }
        return redirect()->route('enrollments.index');
    }
}
