@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="mb-4">
                <h1 class="fs-3 mb-1">Edit User Permissions</h1>
                <p class="mb-0">Manage {{ $user->name }}'s admin access.</p>
            </div>

            <div class="card p-4">
                <form action="{{ route('admin.admin-users.update', $user) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="mb-4">
                        <h5 class="mb-3">User Information</h5>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="mb-3">Permissions</h5>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_admin" name="is_admin" value="1" {{ $user->is_admin ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_admin">
                                <strong>Admin Access</strong>
                                <p class="text-muted small mb-0">Grant this user full admin access to the dashboard and all management features.</p>
                            </label>
                        </div>
                    </div>

                    <div class="alert alert-warning small">
                        <i class="ti ti-alert-triangle"></i>
                        <strong>Warning:</strong> Granting admin access gives the user full control over the website, including the ability to delete content and manage other users.
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update Permissions</button>
                        <a href="{{ route('admin.admin-users.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
