@extends('master.app')

@section('title', 'My Profile')
@section('page_header', 'My Profile')

@section('content')
    <div class="container-fluid p-4">

        <!-- Profile Information -->
        <div class="row mb-4">

            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">

                        @if(auth()->user()->image)
                        <img src="{{ asset('storage/' . auth()->user()->image) }}" class="rounded-circle img-thumbnail mb-3" width="180">
                    @else
                        <img src="https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg" class="rounded-circle img-thumbnail mb-3" width="180">
                    @endif
                        <h4>{{ auth()->user()->name }}</h4>

                        <p class="text-muted">{{ auth()->user()->email }}</p>

                        <p><strong>Contact:</strong> {{ auth()->user()->contact_number }}</p>

                        <p><strong>Role:</strong> {{ auth()->user()->role }}</p>

                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0">Profile Information</h5>
                    </div>

                    <div class="card-body">

                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Name</strong></div>
                            <div class="col-md-8">{{ auth()->user()->name }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Email</strong></div>
                            <div class="col-md-8">{{ auth()->user()->email }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Contact</strong></div>
                            <div class="col-md-8">{{ auth()->user()->contact_number }}</div>
                        </div>

                        <div class="row">
                            <div class="col-md-4"><strong>Role</strong></div>
                            <div class="col-md-8">{{ auth()->user()->role }}</div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- Update Profile Form -->
        <div class="card mb-4 shadow-sm">

            <div class="card-header">
                <h5 class="mb-0">Update Profile</h5>
            </div>

            <div class="card-body">

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Full Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ auth()->user()->name }}"
                            >
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ auth()->user()->email }}"
                            >
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Contact Number</label>
                            <input
                                type="text"
                                name="contact_number"
                                class="form-control"
                                value="{{ auth()->user()->contact_number }}"
                            >
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Profile Image</label>
                            <input
                                type="file"
                                name="image"
                                class="form-control"
                            >
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">
                        Update Profile
                    </button>

                </form>

            </div>

        </div>

        <!-- Change Password Form -->
        <div class="card shadow-sm">

            <div class="card-header">
                <h5 class="mb-0">Change Password</h5>
            </div>

            <div class="card-body">

                <form action="{{ route('profile.password') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Current Password</label>
                        <input
                            type="password"
                            name="current_password"
                            class="form-control"
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                        >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                        >
                    </div>

                    <button type="submit" class="btn btn-warning">
                        Change Password
                    </button>

                </form>

            </div>

        </div>

    </div>
@endsection