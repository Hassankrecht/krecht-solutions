@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="mb-4">
                <h1 class="fs-3 mb-1">Add Testimonial</h1>
                <p class="mb-0">Add a new client testimonial.</p>
            </div>

            <div class="card p-4">
                <form action="{{ route('admin.testimonials.store') }}" method="POST">
                    @include('admin.testimonials._form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
