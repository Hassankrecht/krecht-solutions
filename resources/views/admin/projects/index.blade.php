@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fs-3 mb-1">Projects</h1>
                    <p class="mb-0 text-muted">Manage portfolio projects displayed on the website.</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.project-categories.index') }}" class="btn btn-outline-secondary">
                        <i class="ti ti-category me-1"></i> Manage Categories
                    </a>
                    <a href="{{ route('admin.project-categories.create') }}" class="btn btn-outline-primary">
                        <i class="ti ti-plus me-1"></i> Add Category
                    </a>
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
                        <i class="ti ti-plus me-1"></i> Add Project
                    </a>
                </div>
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
                    <th style="width:70px;">Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Technologies</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                    <tr>
                        <td class="text-muted small">{{ $project->id }}</td>
                        <td>
                            @if($project->image)
                                <img src="{{ asset($project->image) }}" alt=""
                                     style="width:60px;height:44px;object-fit:cover;" class="rounded border">
                            @else
                                <span class="text-muted small">—</span>
                            @endif
                        </td>
                        <td>
                            <div class="fw-semibold">{{ $project->title }}</div>
                            @if($project->description)
                                <div class="small text-muted">{{ Str::limit($project->description, 70) }}</div>
                            @endif
                        </td>
                        <td>
                            @if($project->categories && $project->categories->count() > 0)
                                @foreach($project->categories as $category)
                                    <span class="badge bg-secondary">{{ $category->name_en }}</span>
                                @endforeach
                            @else
                                <span class="text-muted small">—</span>
                            @endif
                        </td>
                        <td class="small text-muted">{{ $project->technologies ? Str::limit($project->technologies, 50) : '—' }}</td>
                        <td>
                            <span class="badge {{ $project->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $project->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>{{ $project->order }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Delete \'{{ addslashes($project->title) }}\'? This cannot be undone.')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="ti ti-inbox fs-2 d-block mb-2"></i>
                            No projects found. <a href="{{ route('admin.projects.create') }}">Add one now.</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($projects->hasPages())
        <div class="mt-3 d-flex justify-content-center">
            {{ $projects->links() }}
        </div>
    @endif
</div>
@endsection
