@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="mb-4">
                <h1 class="fs-3 mb-1">Edit Project Category</h1>
                <p class="mb-0">Update category details.</p>
            </div>

            <div class="card p-4">
                <form action="{{ route('admin.project-categories.update', $projectCategory) }}" method="POST">
                    @method('PUT')
                    @include('admin.project-categories._form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
