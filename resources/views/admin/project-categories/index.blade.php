@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fs-3 mb-1">Project Categories</h1>
                    <p class="mb-0 text-muted">Manage project categories for portfolio filtering.</p>
                </div>
                <a href="{{ route('admin.project-categories.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus me-1"></i> Add Category
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
                    <th>Name (English)</th>
                    <th>Name (Arabic)</th>
                    <th>Slug</th>
                    <th>Projects</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td class="text-muted small">{{ $category->id }}</td>
                        <td class="fw-semibold">{{ $category->name_en }}</td>
                        <td class="text-muted">{{ $category->name_ar ?? '—' }}</td>
                        <td><code class="small">{{ $category->slug }}</code></td>
                        <td>{{ $category->projects()->count() }}</td>
                        <td>
                            <span class="badge {{ $category->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $category->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>{{ $category->sort_order }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.project-categories.edit', $category) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.project-categories.destroy', $category) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Delete category \'{{ addslashes($category->name_en) }}\'? This will remove the category from all projects.')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="ti ti-inbox fs-2 d-block mb-2"></i>
                            No categories found. <a href="{{ route('admin.project-categories.create') }}">Add one now.</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($categories->hasPages())
        <div class="mt-3 d-flex justify-content-center">
            {{ $categories->links() }}
        </div>
    @endif
</div>
@endsection
