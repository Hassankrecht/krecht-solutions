@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fs-3 mb-1">Services</h1>
                    <p class="mb-0 text-muted">Manage service offerings displayed on the website.</p>
                </div>
                <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus me-1"></i> Add Service
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card table-responsive">
        <table class="table mb-0 table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Icon</th>
                    <th>Short Description</th>
                    <th>Status</th>
                    <th>Sort</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                    <tr>
                        <td class="text-muted small">{{ $service->id }}</td>
                        <td>
                            <div class="fw-semibold">{{ $service->title }}</div>
                            <div class="small text-muted">{{ Str::limit($service->description, 70) }}</div>
                        </td>
                        <td>
                            <span class="d-flex align-items-center gap-1">
                                <i class="{{ $service->icon }}"></i>
                                <code class="small">{{ $service->icon }}</code>
                            </span>
                        </td>
                        <td class="small text-muted">{{ $service->short_description ? Str::limit($service->short_description, 60) : '—' }}</td>
                        <td>
                            <span class="badge {{ $service->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $service->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>{{ $service->sort_order }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Delete \'{{ addslashes($service->title) }}\'? This cannot be undone.')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="ti ti-inbox fs-2 d-block mb-2"></i>
                            No services found. <a href="{{ route('admin.services.create') }}">Add one now.</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($services->hasPages())
        <div class="mt-3 d-flex justify-content-center">
            {{ $services->links() }}
        </div>
    @endif
</div>
@endsection
