@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fs-3 mb-1">Testimonials</h1>
                    <p class="mb-0 text-muted">Manage client testimonials displayed on the website.</p>
                </div>
                <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus me-1"></i> Add Testimonial
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
                    <th>Position / Company</th>
                    <th>Email</th>
                    <th>Content</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $testimonial)
                    <tr>
                        <td class="text-muted small">{{ $testimonial->id }}</td>
                        <td class="fw-semibold">{{ $testimonial->name }}</td>
                        <td class="small text-muted">
                            {{ $testimonial->position ?: '—' }}
                            @if($testimonial->company)
                                <br>{{ $testimonial->company }}
                            @endif
                        </td>
                        <td class="small">
                            @if($testimonial->email)
                                <a href="mailto:{{ $testimonial->email }}">{{ $testimonial->email }}</a>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                        <td class="small text-muted">{{ Str::limit($testimonial->content, 80) }}</td>
                        <td>
                            @for($i = 1; $i <= 5; $i++)
                                <i class="ti ti-star{{ $i <= $testimonial->rating ? '-filled text-warning' : ' text-muted' }}"></i>
                            @endfor
                        </td>
                        <td>
                            <span class="badge @class([
                                'bg-warning text-dark' => $testimonial->status === \App\Models\Testimonial::STATUS_PENDING,
                                'bg-success' => $testimonial->status === \App\Models\Testimonial::STATUS_APPROVED,
                                'bg-danger' => $testimonial->status === \App\Models\Testimonial::STATUS_REJECTED,
                                'bg-secondary' => ! in_array($testimonial->status, array_keys(\App\Models\Testimonial::statuses())),
                            ])">
                                {{ \App\Models\Testimonial::statuses()[$testimonial->status] ?? ucfirst($testimonial->status) }}
                            </span>
                            @unless($testimonial->is_active)
                                <span class="badge bg-secondary">Inactive</span>
                            @endunless
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.testimonials.show', $testimonial) }}" class="btn btn-sm btn-outline-secondary">View</a>
                            @if($testimonial->status !== \App\Models\Testimonial::STATUS_APPROVED)
                                <form action="{{ route('admin.testimonials.approve', $testimonial) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-outline-success">Approve</button>
                                </form>
                            @endif
                            @if($testimonial->status !== \App\Models\Testimonial::STATUS_REJECTED)
                                <form action="{{ route('admin.testimonials.reject', $testimonial) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-outline-warning">Reject</button>
                                </form>
                            @endif
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Delete testimonial from \'{{ addslashes($testimonial->name) }}\'?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="ti ti-inbox fs-2 d-block mb-2"></i>
                            No testimonials found. <a href="{{ route('admin.testimonials.create') }}">Add one now.</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($testimonials->hasPages())
        <div class="mt-3 d-flex justify-content-center">
            {{ $testimonials->links() }}
        </div>
    @endif
</div>
@endsection
