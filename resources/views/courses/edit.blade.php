@extends('master.app')

@section('title', 'Edit Course')
@section('page_header', 'Edit Course')

@section('content')

<div class="container-fluid p-4">

    <div class="card shadow-sm">

        <div class="card-header">
            <h5 class="mb-0">Edit Course</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('courses.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Course Name -->
                <div class="mb-3">
                    <label class="form-label">Course Name</label>
                    <input type="text"
                           name="course_name"
                           class="form-control @error('course_name') is-invalid @enderror"
                           value="{{ old('course_name', $course->course_name) }}"
                           required>

                    @error('course_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Course ID -->
                <div class="mb-3">
                    <label class="form-label">Course ID</label>
                    <input type="text"
                           name="course_id"
                           class="form-control @error('course_id') is-invalid @enderror"
                           value="{{ old('course_id', $course->course_id) }}"
                           required>

                    @error('course_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Credit Hours -->
                <div class="mb-3">
                    <label class="form-label">Credit Hours</label>
                    <input type="number"
                           name="credit_hours"
                           class="form-control @error('credit_hours') is-invalid @enderror"
                           value="{{ old('credit_hours', $course->credit_hours) }}"
                           required>

                    @error('credit_hours')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Leader -->
                <div class="mb-3">
                    <label class="form-label">Course Leader</label>

                    <select name="leader_id"
                            class="form-select @error('leader_id') is-invalid @enderror"
                            required>

                        <option value="">Select Leader</option>

                        @foreach($leaders as $leader)
                            <option value="{{ $leader->id }}"
                                {{ old('leader_id', $course->leader_id) == $leader->id ? 'selected' : '' }}>
                                {{ $leader->name }}
                            </option>
                        @endforeach

                    </select>

                    @error('leader_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label class="form-label">Status</label>

                    <select name="status"
                            class="form-select @error('status') is-invalid @enderror"
                            required>

                        <option value="1"
                            {{ old('status', $course->status) == 1 ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0"
                            {{ old('status', $course->status) == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Start Date -->
                <div class="mb-3">
                    <label class="form-label">Start Date</label>
                    <input type="date"
                           name="start_date"
                           class="form-control @error('start_date') is-invalid @enderror"
                           value="{{ old('start_date', $course->start_date) }}">

                    @error('start_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- End Date -->
                <div class="mb-3">
                    <label class="form-label">End Date</label>
                    <input type="date"
                           name="end_date"
                           class="form-control @error('end_date') is-invalid @enderror"
                           value="{{ old('end_date', $course->end_date) }}">

                    @error('end_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label">Description</label>

                    <textarea name="description"
                              rows="4"
                              class="form-control @error('description') is-invalid @enderror">{{ old('description', $course->description) }}</textarea>

                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Update Course
                    </button>

                    <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>

            </form>

        </div>

    </div>

</div>

@endsection

