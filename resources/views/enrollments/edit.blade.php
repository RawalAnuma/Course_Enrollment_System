@extends('master.app')

@section('title', 'Edit Enrollment')
@section('page_header', 'Edit Enrollment')

@section('content')

<div class="container-fluid p-4">

    <div class="card shadow-sm">

        <div class="card-header">
            <h5 class="mb-0">Edit Enrollment</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Course -->
                <div class="mb-3">
                    <label class="form-label">Course</label>

                    <select name="course_id" class="form-select @error('course_id') is-invalid @enderror" required>

                        <option value="">Select Course</option>

                        @foreach($courses as $course)
                            <option value="{{ $course->id }}"
                                {{ old('course_id', $enrollment->course_id) == $course->id ? 'selected' : '' }}>
                                {{ $course->course_name }}
                            </option>
                        @endforeach

                    </select>

                    @error('course_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Student -->
                <div class="mb-3">
                    <label class="form-label">Student</label>

                    <select name="user_id" class="form-select @error('user_id') is-invalid @enderror" required>

                        <option value="">Select Student</option>

                        @foreach($students as $student)
                            <option value="{{ $student->id }}"
                                {{ old('user_id', $enrollment->user_id) == $student->id ? 'selected' : '' }}>
                                {{ $student->name }}
                            </option>
                        @endforeach

                    </select>

                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label class="form-label">Status</label>

                    <select name="status" class="form-select @error('status') is-invalid @enderror" required>

                        <option value="1"
                            {{ old('status', $enrollment->status) == 1 ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0"
                            {{ old('status', $enrollment->status) == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Completed At -->
                <div class="mb-3">
                    <label class="form-label">Completed At</label>

                    <input
                        type="date"
                        name="completed_at"
                        class="form-control @error('completed_at') is-invalid @enderror"
                        value="{{ old('completed_at', $enrollment->completed_at) }}">

                    @error('completed_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Update Enrollment
                    </button>

                    <a href="{{ route('enrollments.index') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>

            </form>

        </div>

    </div>

</div>

@endsection

