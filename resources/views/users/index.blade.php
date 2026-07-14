@extends('master.app')

@section('title', 'Users')
@section('page_header', 'Users List')
@section('content')
     <!-- Content -->
<div class="container-fluid p-4">

    <div class="card shadow-sm">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Users</h5>

            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle"></i> Add User
            </a>
        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-light">
                    <tr>
                        <th width="70">S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th width="140">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->contact_number }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                @if($user->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>

                                <button
                                    type="button"
                                    class="btn btn-info btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#userModal{{ $user->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>

                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('users.delete', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this user?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modal for User Details -->
            @foreach ($users as $user)

            <div class="modal fade" id="userModal{{ $user->id }}" tabindex="-1">

                <div class="modal-dialog">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">
                                User Details
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
                                    <th>Name</th>
                                    <td>{{ $user->name }}</td>
                                </tr>

                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>

                                <tr>
                                    <th>Contact</th>
                                    <td>{{ $user->contact_number }}</td>
                                </tr>

                                <tr>
                                    <th>Role</th>
                                    <td>{{ ucfirst($user->role) }}</td>
                                </tr>

                                <tr>
                                    <th>Status</th>

                                    <td>
                                        @if($user->status)
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
