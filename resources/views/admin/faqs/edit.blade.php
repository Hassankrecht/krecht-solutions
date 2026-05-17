@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="mb-4">
                <h1 class="fs-3 mb-1">Edit FAQ</h1>
                <p class="mb-0">Update FAQ details.</p>
            </div>

            <div class="card p-4">
                <form action="{{ route('admin.faqs.update', $faq) }}" method="POST">
                    @method('PUT')
                    @include('admin.faqs._form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
