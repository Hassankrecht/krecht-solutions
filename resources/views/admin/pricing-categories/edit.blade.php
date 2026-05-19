@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="fs-3 mb-1">Edit Pricing Category</h1>
                    <p class="mb-0 text-muted">Update pricing package category details.</p>
                </div>
                <a href="{{ route('admin.pricing-categories.index') }}" class="btn btn-outline-secondary">
                    <i class="ti ti-arrow-left me-1"></i> Back
                </a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.pricing-categories.update', $pricingCategory) }}" method="POST">
                @method('PUT')
                @include('admin.pricing-categories._form', ['pricingCategory' => $pricingCategory])
            </form>
        </div>
    </div>
</div>
@endsection
