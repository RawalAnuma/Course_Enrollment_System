@extends('master.app')

@section('title', 'Course Enrollments')
@section('page_header', 'Course Enrollments')

@section('content')

<div class="container-fluid p-4">

    <div class="card shadow-sm">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Enrollment List</h5>

        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light">
                    <tr>
                        <th>S.No</th>
                        <th>Student</th>
                        <th>Course</th>
                        <th>Course ID</th>
                        <th>Course Leader</th>
                        <th>Status</th>
                        <th>Enrolled At</th>
                        <th>Completed At</th>
                        <th width="180">Actions</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($enrollments as $index => $enrollment)

                    <tr>

                        <td>{{ $index + 1 }}</td>

                        <td>{{ $enrollment->student->name }}</td>

                        <td>{{ $enrollment->course->course_name }}</td>

                        <td>{{ $enrollment->course->course_id }}</td>

                        <td>{{ $enrollment->course->leader->name }}</td>

                        <td>
                            @if($enrollment->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>

                        <td>{{ $enrollment->enrolled_at }}</td>

                        <td>
                            {{ $enrollment->completed_at ?? '-' }}
                        </td>

                        <td>

                            <button
                                type="button"
                                class="btn btn-info btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#enrollmentModal{{ $enrollment->id }}">
                                <i class="bi bi-eye"></i>
                            </button>

                            <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('enrollments.delete', $enrollment->id) }}" method="POST" class="d-inline" onclick="return confirm('Are you sure you want to delete this enrollment?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="9" class="text-center">
                            No enrollments found.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>
            
            <!-- Modal for Enrollment Details -->
            @foreach ($enrollments as $enrollment)

            <div class="modal fade" id="enrollmentModal{{ $enrollment->id }}" tabindex="-1">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">
                                Enrollment Details
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
                                    <th>Student Name</th>
                                    <td>{{ $enrollment->student->name }}</td>
                                </tr>

                                <tr>
                                    <th>Course Name</th>
                                    <td>{{ $enrollment->course->course_name }}</td>
                                </tr>

                                <tr>
                                    <th>Course ID</th>
                                    <td>{{ $enrollment->course->course_id }}</td>
                                </tr>

                                <tr>
                                    <th>Leader Name</th>
                                    <td>{{ $enrollment->course->leader->name }}</td>
                                </tr>

                                <tr>
                                    <th>Status</th>

                                    <td>
                                        @if($enrollment->status)
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
                                    <th>Enrolled Date</th>
                                    <td>{{$enrollment->enrolled_at}}</td>
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