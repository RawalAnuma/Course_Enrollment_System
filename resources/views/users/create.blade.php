@extends('master.app')

@section('title', 'Create User')
@section('page_header', 'Create New User')
@section('content')
        <!-- Page Content -->
        <div class="container-fluid p-4">

            <div class="card shadow-sm">

                <div class="card-header">
                    <h5 class="mb-0">Create New User</h5>
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

                    <form action="{{ route('users.store') }}" method="POST">

                        @csrf

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    value="{{ old('name') }}"
                                    required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ old('email') }}"
                                    required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact Number</label>
                                <input
                                    type="text"
                                    name="contact_number"
                                    class="form-control"
                                    value="{{ old('contact_number') }}"
                                    required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Role</label>
                                <select name="role" class="form-select">
                                    <option value="">Select Role</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="student">Student</option>
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
                                <label class="form-label">Password</label>
                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    required>
                            </div>

                        </div>

                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle"></i> Save User
                        </button>

                        <a href="{{ route('users.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Back
                        </a>

                    </form>

                </div>

            </div>

        </div>

@endsection