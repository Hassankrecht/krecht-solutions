@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="mb-4">
                <h1 class="fs-3 mb-1">Edit Service</h1>
                <p class="mb-0">Update service details.</p>
            </div>

            <div class="card p-4">
                <form action="{{ route('admin.services.update', $service) }}" method="POST">
                    @method('PUT')
                    @include('admin.services._form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
