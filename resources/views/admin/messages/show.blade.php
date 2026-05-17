@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fs-3 mb-1">Message Details</h1>
                    <p class="mb-0 text-muted">Received {{ $message->created_at->format('d M Y, H:i') }}</p>
                </div>
                <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-outline-secondary">
                    <i class="ti ti-arrow-left me-1"></i> Back to Messages
                </a>
            </div>

            <div class="card p-4">
                <dl class="row mb-0">
                    <dt class="col-sm-3 text-muted">Name</dt>
                    <dd class="col-sm-9">{{ $message->name }}</dd>

                    <dt class="col-sm-3 text-muted">Email</dt>
                    <dd class="col-sm-9">
                        <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                    </dd>

                    @if($message->phone)
                    <dt class="col-sm-3 text-muted">Phone</dt>
                    <dd class="col-sm-9">{{ $message->phone }}</dd>
                    @endif

                    @if($message->subject)
                    <dt class="col-sm-3 text-muted">Subject</dt>
                    <dd class="col-sm-9">{{ $message->subject }}</dd>
                    @endif

                    <dt class="col-sm-3 text-muted">Status</dt>
                    <dd class="col-sm-9">
                        @if($message->is_read)
                            <span class="badge bg-secondary">Read</span>
                        @else
                            <span class="badge bg-primary">Unread</span>
                        @endif
                    </dd>

                    <dt class="col-sm-3 text-muted mt-3">Message</dt>
                    <dd class="col-sm-9 mt-3">
                        <div class="p-3 bg-light rounded" style="white-space: pre-wrap;">{{ $message->message }}</div>
                    </dd>
                </dl>

                <div class="d-flex gap-2 mt-4 pt-3 border-top">
                    <a href="mailto:{{ $message->email }}" class="btn btn-primary">
                        <i class="ti ti-mail me-1"></i> Reply by Email
                    </a>
                    <form action="{{ route('admin.contact-messages.mark-read', $message) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-outline-secondary">
                            <i class="ti ti-{{ $message->is_read ? 'mail' : 'mail-opened' }} me-1"></i>
                            Mark as {{ $message->is_read ? 'Unread' : 'Read' }}
                        </button>
                    </form>
                    <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" class="d-inline ms-auto">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger"
                            onclick="return confirm('Delete this message permanently?')">
                            <i class="ti ti-trash me-1"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
