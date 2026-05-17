@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="mb-4">
                <h1 class="fs-3 mb-1">Edit Pricing Package</h1>
                <p class="mb-0">Update pricing plan details.</p>
            </div>

            <div class="card p-4">
                <form action="{{ route('admin.pricing-packages.update', $pricingPackage) }}" method="POST">
                    @method('PUT')
                    @include('admin.pricing-packages._form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
