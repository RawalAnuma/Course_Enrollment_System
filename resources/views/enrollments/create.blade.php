@extends('master.app')

@section('title', 'Enroll Course')

@section('page_header', 'Enroll Student')

@section('content')

<div class="container-fluid p-4">

    <div class="card shadow">

        <div class="card-header">
            <h5>Course Enrollment</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('enrollments.store') }}" method="POST">

                @csrf

                <input type="hidden"
                       name="course_id"
                       value="{{ $course->id }}">

                <div class="mb-3">
                    <label class="form-label">Course</label>
                    <input type="text"
                           class="form-control"
                           value="{{ $course->course_name }}"
                           readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Student</label>

                    <select name="user_id" class="form-select" required>

                        <option value="">Select Student</option>

                        @foreach($students as $student)

                            <option value="{{ $student->id }}">
                                {{ $student->name }}
                            </option>

                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>

                    <select name="status" class="form-select">

                        <option value="1">Active</option>
                        <option value="0">Inactive</option>

                    </select>

                </div>

                <button class="btn btn-primary">
                    Save Enrollment
                </button>

                <a href="{{ route('courses.index') }}"
                    class="btn btn-secondary">
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

@endsection