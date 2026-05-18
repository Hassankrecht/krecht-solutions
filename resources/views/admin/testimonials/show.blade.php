@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fs-3 mb-1">Testimonial Details</h1>
                    <p class="mb-0 text-muted">Review the submitted testimonial before publishing.</p>
                </div>
                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary">Back</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card p-4">
                <div class="row gy-4">
                    <div class="col-md-3">
                        @if($testimonial->image)
                            <img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->name }}" class="img-fluid rounded">
                        @else
                            <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted" style="min-height: 160px;">
                                No image
                            </div>
                        @endif
                    </div>
                    <div class="col-md-9">
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <span class="badge @class([
                                'bg-warning text-dark' => $testimonial->status === \App\Models\Testimonial::STATUS_PENDING,
                                'bg-success' => $testimonial->status === \App\Models\Testimonial::STATUS_APPROVED,
                                'bg-danger' => $testimonial->status === \App\Models\Testimonial::STATUS_REJECTED,
                            ])">
                                {{ \App\Models\Testimonial::statuses()[$testimonial->status] ?? ucfirst($testimonial->status) }}
                            </span>
                            <span class="badge {{ $testimonial->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $testimonial->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>

                        <h2 class="fs-4 mb-1">{{ $testimonial->name }}</h2>
                        <p class="text-muted mb-2">
                            {{ $testimonial->position ?: 'No position provided' }}
                            @if($testimonial->company)
                                at {{ $testimonial->company }}
                            @endif
                        </p>
                        <p class="mb-2">
                            @if($testimonial->email)
                                <a href="mailto:{{ $testimonial->email }}">{{ $testimonial->email }}</a>
                            @else
                                <span class="text-muted">No email provided</span>
                            @endif
                        </p>
                        <div class="mb-3">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="ti ti-star{{ $i <= $testimonial->rating ? '-filled text-warning' : ' text-muted' }}"></i>
                            @endfor
                        </div>
                        <p class="mb-0">{{ $testimonial->content }}</p>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-2 mt-4">
                    @if($testimonial->status !== \App\Models\Testimonial::STATUS_APPROVED)
                        <form action="{{ route('admin.testimonials.approve', $testimonial) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">Approve</button>
                        </form>
                    @endif
                    @if($testimonial->status !== \App\Models\Testimonial::STATUS_REJECTED)
                        <form action="{{ route('admin.testimonials.reject', $testimonial) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning">Reject</button>
                        </form>
                    @endif
                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="ms-auto">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger"
                            onclick="return confirm('Delete testimonial from \'{{ addslashes($testimonial->name) }}\'?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
