@extends('master.app')

@section('title', 'Courses')
@section('page_header', 'Courses List')
@section('content')

 <!-- Content -->
<div class="container-fluid p-4">

    <div class="card shadow-sm">

        <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Courses</h5>

        <a href="{{ route('courses.create') }}" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> Add Course
        </a>
    </div>

        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light">
                    <tr>
                        <th width="70">S.No</th>
                        <th>Course Name</th>
                        <th>Course ID</th>
                        <th>Credit Hours</th>
                        <th>Leader Name</th>
                        <th>Status</th>
                        <th>Description</th>
                        <th width="220">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($courses as $index => $course)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ $course->course_id }}</td>
                        <td>{{ $course->credit_hours }}</td>
                        <td>{{ $course->leader->name }}</td>
                        <td>
                            @if($course->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $course->description }}</td>
                        
                        <td>
                            <div class="d-flex gap-2">

                                <button
                                    type="button"
                                    class="btn btn-info btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#courseModal{{ $course->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>

                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('courses.delete', $course->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this course?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                

                                <a href="{{ route('enrollments.create', $course->id) }}"class="btn btn-success btn-sm">
                                    <i class="bi bi-bookmark-check"></i> Enroll
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


            <!-- Modal for Course Details -->
            @foreach ($courses as $course)

            <div class="modal fade" id="courseModal{{ $course->id }}" tabindex="-1">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">
                                Course Details
                            </h5>

                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal">
                            </button>
                        </div>

                        <div class="modal-body">

                            <table class="table">

                                <tr>
                                    <th>Course Name</th>
                                    <td>{{ $course->course_name }}</td>
                                </tr>

                                <tr>
                                    <th>Course Id</th>
                                    <td>{{ $course->course_id }}</td>
                                </tr>

                                <tr>
                                    <th>Credit Hours</th>
                                    <td>{{ $course->credit_hours }}</td>
                                </tr>

                                <tr>
                                    <th>Leader Name</th>
                                    <td>{{ $course->leader->name }}</td>
                                </tr>

                                <tr>
                                    <th>Status</th>

                                    <td>
                                        @if($course->status)
                                            <span class="badge bg-success">
                                                Active
                                            </span>
                                        @else
                                            <span class="badge bg-danger">
                                                Inactive
                                            </span>
                                        @endif
                                    </td>

                                </tr>

                                <tr>
                                    <th>Description </th>
                                    <td>{{$course->description}}</td>
                                </tr>    

                            </table>

                        </div>

                        <div class="modal-footer">

                            <button
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">
                                Close
                            </button>

                        </div>

                    </div>

                </div>

            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection  