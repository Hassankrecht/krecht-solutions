@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="mb-4">
                <h1 class="fs-3 mb-1">Add Project Category</h1>
                <p class="mb-0">Create a new category for organizing projects.</p>
            </div>

            <div class="card p-4">
                <form action="{{ route('admin.project-categories.store') }}" method="POST">
                    @include('admin.project-categories._form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
