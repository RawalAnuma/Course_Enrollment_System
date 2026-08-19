<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Course;

use Illuminate\Http\Request;
use App\Repositories\Contracts\CourseRepositoryInterface;
use Exception;

class CourseController extends Controller
{
    private CourseRepositoryInterface $courseRepository;

    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function index()
    {
        $courses = $this->courseRepository->getAll();
        return view('courses.index', compact('courses'));
    }

    public function create(){
        $leaders = User::where('role', 'teacher')->get();
        return view('courses.create', compact('leaders'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
        'course_name' => 'required|string|max:255',
        'course_id' => 'required|string|max:255|unique:courses,course_id',
        'credit_hours' => 'required|integer|min:1',
        'leader_id' => 'required|exists:users,id',
        'status' => 'required|boolean',
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
        'description' => 'nullable|string',
        ]);

        $this->courseRepository->create($validatedData);

        return redirect()->route('courses.index')->with('success', 'Course created successfully!');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));

    }


    public function edit(Course $course){
        $leaders = User::where('role', 'teacher')->get();
        return view('courses.edit', compact('course', 'leaders'));
    }

    public function update(Request $request, Course $course){
        $validatedData = $request->validate([
            'course_name' => 'required|string|max:255',
            'course_id' => 'required|string|max:255|unique:courses,course_id,' . $course->id,
            'credit_hours' => 'required|integer|min:1',
            'leader_id' => 'required|exists:users,id',
            'status' => 'required|boolean',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ]);

        $this->courseRepository->update($course, $validatedData);
        toastr()->success('Course updated successfully!');

        return redirect()->route('courses.index');
    }


    public function destroy(Course $course){
        try{
            $this->courseRepository->delete($course);
            // Display a success toast with no title
            toastr()->success('Data has been deleted successfully!');
        }catch(Exception $ex){
            // Display an error toast with no title
            toastr()->error('An error occurred while deleting the data.');
        }
        return redirect()->route('courses.index');
        
    }

    
}
