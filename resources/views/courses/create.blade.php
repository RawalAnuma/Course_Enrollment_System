@extends('master.app')

@section('title', 'Create Course')
@section('page_header', 'Create New Course')
@section('content')
        <!-- Page Content -->
        <div class="container-fluid p-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <h5 class="mb-0">Create New Course</h5>
                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('courses.store') }}" method="POST">

                       

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Course Name</label>
                                <input
                                    type="text"
                                    name="course_name"
                                    class="form-control"
                                    value="{{ old('course_name') }}"
                                    required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Course ID</label>
                                <input
                                    type="text"
                                    name="course_id"
                                    class="form-control"
                                    value="{{ old('course_id') }}"
                                    required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Credit Hours</label>
                                <input
                                    type="number"
                                    name="credit_hours"
                                    class="form-control"
                                    value="{{ old('credit_hours') }}"
                                    min="1"
                                    required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Course Leader</label>

                                <select name="leader_id" class="form-select" required>
                                    <option value="">Select Teacher</option>

                                    @foreach($leaders as $leader)
                                        <option value="{{ $leader->id }}"
                                            {{ old('leader_id') == $leader->id ? 'selected' : '' }}>
                                            {{ $leader->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>

                                <select name="status" class="form-select">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Start Date</label>
                                <input
                                    type="date"
                                    name="start_date"
                                    class="form-control"
                                    value="{{ old('start_date') }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">End Date</label>
                                <input
                                    type="date"
                                    name="end_date"
                                    class="form-control"
                                    value="{{ old('end_date') }}">
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Description</label>

                                <textarea
                                    name="description"
                                    rows="4"
                                    class="form-control">{{ old('description') }}</textarea>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle"></i> Save Course
                        </button>

                        <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>

                    </form>

                </div>

            </div>

        </div>

@endsection