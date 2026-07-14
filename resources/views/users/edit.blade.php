@extends('master.app')

@section('title', 'Edit User')
@section('page_header', 'Edit User')

@section('content')

<div class="container-fluid p-4">

    <div class="card shadow-sm">

        <div class="card-header">
            <h5 class="mb-0">Edit User</h5>
        </div>

        <div class="card-body">

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $user->name) }}"
                        required>

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input
                        type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', $user->email) }}"
                        required>

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contact Number -->
                <div class="mb-3">
                    <label class="form-label">Contact Number</label>
                    <input
                        type="text"
                        name="contact_number"
                        class="form-control @error('contact_number') is-invalid @enderror"
                        value="{{ old('contact_number', $user->contact_number) }}"
                        required>

                    @error('contact_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Role -->
                <div class="mb-3">
                    <label class="form-label">Role</label>

                    <select
                        name="role"
                        class="form-select @error('role') is-invalid @enderror"
                        required>

                        <option value="">Select Role</option>

                        <option value="teacher"
                            {{ old('role', $user->role) == 'teacher' ? 'selected' : '' }}>
                            Teacher
                        </option>

                        <option value="student"
                            {{ old('role', $user->role) == 'student' ? 'selected' : '' }}>
                            Student
                        </option>

                    </select>

                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Status -->
                <div class="mb-3">
                    <label class="form-label">Status</label>

                    <select
                        name="status"
                        class="form-select @error('status') is-invalid @enderror"
                        required>

                        <option value="1"
                            {{ old('status', $user->status) == 1 ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="0"
                            {{ old('status', $user->status) == 0 ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle"></i> Update User
                    </button>

                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>

            </form>

        </div>

    </div>

</div>

@endsection

