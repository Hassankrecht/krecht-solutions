@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="mb-4">
                <h1 class="fs-3 mb-1">Edit Testimonial</h1>
                <p class="mb-0">Update testimonial details.</p>
            </div>

            <div class="card p-4">
                <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST">
                    @method('PUT')
                    @include('admin.testimonials._form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
