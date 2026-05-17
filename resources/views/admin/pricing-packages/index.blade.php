@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fs-3 mb-1">Pricing Packages</h1>
                    <p class="mb-0 text-muted">Manage pricing plans displayed on the website.</p>
                </div>
                <a href="{{ route('admin.pricing-packages.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus me-1"></i> Add Package
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
                    <th>Name</th>
                    <th>Price</th>
                    <th>Features</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pricingPackages as $package)
                    <tr>
                        <td class="text-muted small">{{ $package->id }}</td>
                        <td class="fw-semibold">{{ $package->name }}</td>
                        <td>{{ $package->price }}</td>
                        <td class="small text-muted">
                            {{ is_array($package->features) ? count($package->features) . ' feature(s)' : '—' }}
                        </td>
                        <td>
                            @if($package->is_featured)
                                <span class="badge bg-warning text-dark">Featured</span>
                            @else
                                <span class="text-muted small">—</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge {{ $package->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $package->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>{{ $package->order }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.pricing-packages.edit', $package) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.pricing-packages.destroy', $package) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Delete \'{{ addslashes($package->name) }}\'? This cannot be undone.')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="ti ti-inbox fs-2 d-block mb-2"></i>
                            No pricing packages found. <a href="{{ route('admin.pricing-packages.create') }}">Add one now.</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($pricingPackages->hasPages())
        <div class="mt-3 d-flex justify-content-center">
            {{ $pricingPackages->links() }}
        </div>
    @endif
</div>
@endsection
