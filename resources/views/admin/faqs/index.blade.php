@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fs-3 mb-1">FAQs</h1>
                    <p class="mb-0 text-muted">Manage frequently asked questions displayed on the website.</p>
                </div>
                <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">
                    <i class="ti ti-plus me-1"></i> Add FAQ
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
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($faqs as $faq)
                    <tr>
                        <td class="text-muted small">{{ $faq->id }}</td>
                        <td class="fw-semibold">{{ Str::limit($faq->question, 80) }}</td>
                        <td class="small text-muted">{{ Str::limit($faq->answer, 100) }}</td>
                        <td>
                            <span class="badge {{ $faq->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $faq->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>{{ $faq->order }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Delete this FAQ? This cannot be undone.')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="ti ti-inbox fs-2 d-block mb-2"></i>
                            No FAQs found. <a href="{{ route('admin.faqs.create') }}">Add one now.</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($faqs->hasPages())
        <div class="mt-3 d-flex justify-content-center">
            {{ $faqs->links() }}
        </div>
    @endif
</div>
@endsection
