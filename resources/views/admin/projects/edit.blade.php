@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="mb-4">
                <h1 class="fs-3 mb-1">Edit Project</h1>
                <p class="mb-0">Update project details.</p>
            </div>

            <div class="card p-4">
                <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                    @method('PUT')
                    @include('admin.projects._form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
