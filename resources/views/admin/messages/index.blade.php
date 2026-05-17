@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fs-3 mb-1">Messages</h1>
                    <p class="mb-0 text-muted">Contact form submissions from visitors.</p>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Received</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $message)
                    <tr class="{{ $message->is_read ? '' : 'fw-semibold' }}">
                        <td class="text-muted small">{{ $message->id }}</td>
                        <td>{{ $message->name }}</td>
                        <td class="small">{{ $message->email }}</td>
                        <td class="small">{{ $message->subject ? Str::limit($message->subject, 50) : '—' }}</td>
                        <td class="small text-muted">{{ $message->created_at->format('d M Y, H:i') }}</td>
                        <td>
                            @if($message->is_read)
                                <span class="badge bg-secondary">Read</span>
                            @else
                                <span class="badge bg-primary">Unread</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.contact-messages.show', $message) }}" class="btn btn-sm btn-outline-primary">View</a>
                            <form action="{{ route('admin.contact-messages.mark-read', $message) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-outline-secondary" title="{{ $message->is_read ? 'Mark as unread' : 'Mark as read' }}">
                                    <i class="ti ti-{{ $message->is_read ? 'mail' : 'mail-opened' }}"></i>
                                </button>
                            </form>
                            <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Delete this message? This cannot be undone.')">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="ti ti-inbox fs-2 d-block mb-2"></i>
                            No messages found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($messages->hasPages())
        <div class="mt-3 d-flex justify-content-center">
            {{ $messages->links() }}
        </div>
    @endif
</div>
@endsection
