@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="mb-4">
                <h1 class="fs-3 mb-1">Add Service</h1>
                <p class="mb-0">Create a new website service item.</p>
            </div>

            <div class="card p-4">
                <form action="{{ route('admin.services.store') }}" method="POST">
                    @include('admin.services._form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
