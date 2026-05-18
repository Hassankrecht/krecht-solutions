@extends('layouts.admin')

@section('content')
<div class="container-fluid"
     data-chart-sales-purchase="{{ json_encode($chartData['salesPurchase']) }}"
     data-chart-customer="{{ json_encode($chartData['customer']) }}">

    <div class="row">
        <div class="col-12">
            <div class="mb-4">
                <h1 class="fs-3 mb-1">Dashboard</h1>
                <p class="mb-0 text-muted">Welcome back, {{ auth()->user()?->name ?? 'Admin' }}. Here's your overview.</p>
            </div>
        </div>
    </div>

    <!-- Row 1 — 4 stat cards -->
    <div class="row g-3 mb-3">
        <div class="col-lg-3 col-md-6">
            <div class="card p-4 bg-primary bg-opacity-10 border border-primary border-opacity-25 rounded-2">
                <div class="d-flex gap-3">
                    <div class="icon-shape icon-md bg-primary text-white rounded-2">
                        <i class="ti ti-box-seam fs-4"></i>
                    </div>
                    <div>
                        <h2 class="mb-1 fs-6 text-muted">Services</h2>
                        <h3 class="fw-bold mb-0 fs-4">{{ $stats['services'] }}</h3>
                        <a href="{{ route('admin.services.index') }}" class="small text-primary">Manage →</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card p-4 bg-success bg-opacity-10 border border-success border-opacity-25 rounded-2">
                <div class="d-flex gap-3">
                    <div class="icon-shape icon-md bg-success text-white rounded-2">
                        <i class="ti ti-briefcase fs-4"></i>
                    </div>
                    <div>
                        <h2 class="mb-1 fs-6 text-muted">Projects</h2>
                        <h3 class="fw-bold mb-0 fs-4">{{ $stats['projects'] }}</h3>
                        <a href="{{ route('admin.projects.index') }}" class="small text-success">Manage →</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card p-4 bg-info bg-opacity-10 border border-info border-opacity-25 rounded-2">
                <div class="d-flex gap-3">
                    <div class="icon-shape icon-md bg-info text-white rounded-2">
                        <i class="ti ti-receipt fs-4"></i>
                    </div>
                    <div>
                        <h2 class="mb-1 fs-6 text-muted">Pricing Packages</h2>
                        <h3 class="fw-bold mb-0 fs-4">{{ $stats['pricing_packages'] }}</h3>
                        <a href="{{ route('admin.pricing-packages.index') }}" class="small text-info">Manage →</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card p-4 bg-danger bg-opacity-10 border border-danger border-opacity-25 rounded-2">
                <div class="d-flex gap-3">
                    <div class="icon-shape icon-md bg-danger text-white rounded-2">
                        <i class="ti ti-message-2 fs-4"></i>
                    </div>
                    <div>
                        <h2 class="mb-1 fs-6 text-muted">Unread Messages</h2>
                        <h3 class="fw-bold mb-0 fs-4">{{ $stats['unread_messages'] }}</h3>
                        <a href="{{ route('admin.contact-messages.index') }}" class="small text-danger">View →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row 2 — 3 stat cards -->
    <div class="row g-3 mb-3">
        <div class="col-lg-4 col-md-6">
            <div class="card p-4 bg-warning bg-opacity-10 border border-warning border-opacity-25 rounded-2">
                <div class="d-flex gap-3">
                    <div class="icon-shape icon-md bg-warning text-white rounded-2">
                        <i class="ti ti-star fs-4"></i>
                    </div>
                    <div>
                        <h2 class="mb-1 fs-6 text-muted">Testimonials</h2>
                        <h3 class="fw-bold mb-0 fs-4">{{ $stats['testimonials'] }}</h3>
                        <a href="{{ route('admin.testimonials.index') }}" class="small text-warning">Manage →</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card p-4 bg-secondary bg-opacity-10 border border-secondary border-opacity-25 rounded-2">
                <div class="d-flex gap-3">
                    <div class="icon-shape icon-md bg-secondary text-white rounded-2">
                        <i class="ti ti-file-text fs-4"></i>
                    </div>
                    <div>
                        <h2 class="mb-1 fs-6 text-muted">FAQs</h2>
                        <h3 class="fw-bold mb-0 fs-4">{{ $stats['faqs'] }}</h3>
                        <a href="{{ route('admin.faqs.index') }}" class="small text-secondary">Manage →</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card p-4 bg-dark bg-opacity-10 border border-dark border-opacity-25 rounded-2">
                <div class="d-flex gap-3">
                    <div class="icon-shape icon-md bg-dark text-white rounded-2">
                        <i class="ti ti-inbox fs-4"></i>
                    </div>
                    <div>
                        <h2 class="mb-1 fs-6 text-muted">Total Messages</h2>
                        <h3 class="fw-bold mb-0 fs-4">{{ $stats['total_messages'] }}</h3>
                        <a href="{{ route('admin.contact-messages.index') }}" class="small">View all →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row 3 — Charts -->
    <div class="row g-3 mb-3">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center bg-transparent px-4 py-3">
                    <h3 class="h5 mb-0">Sales vs Purchase</h3>
                    <div>
                        <select class="form-select form-select-sm">
                            <option selected>This Year</option>
                            <option>This Month</option>
                            <option>This Week</option>
                        </select>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div id="salesPurchaseChart"></div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center bg-transparent px-4 py-3">
                    <h3 class="h5 mb-0">Overall Information</h3>
                    <div>
                        <select class="form-select form-select-sm">
                            <option selected>Last 6 Months</option>
                            <option>This Month</option>
                            <option>This Week</option>
                        </select>
                    </div>
                </div>
                <div class="card-body p-4">
                    <h3 class="h6">Customers Overview</h3>
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div id="customerChart"></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-6 border-end">
                                    <div class="text-center">
                                        <h2 class="mb-1">5.5K</h2>
                                        <p class="text-success mb-2">First Time</p>
                                        <span class="badge bg-success"><i class="ti ti-arrow-up-left me-1"></i>25%</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-center">
                                        <h2 class="mb-1">3.5K</h2>
                                        <p class="text-warning mb-2">Return</p>
                                        <span class="badge bg-success badge-xs d-inline-flex align-items-center"><i
                                            class="ti ti-arrow-up-left me-1"></i>21%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center border-top mt-4 pt-4">
                        <div class="col-4 border-end">
                            <h3 class="fw-bold mb-2">{{ $stats['services'] }}</h3>
                            <small class="text-secondary">Services</small>
                        </div>
                        <div class="col-4 border-end">
                            <h3 class="fw-bold mb-2">{{ $stats['projects'] }}</h3>
                            <small class="text-secondary">Projects</small>
                        </div>
                        <div class="col-4">
                            <h3 class="fw-bold mb-2">{{ $stats['pricing_packages'] }}</h3>
                            <small class="text-secondary">Packages</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row g-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-transparent px-4 py-3">
                    <h3 class="h5 mb-0">Quick Actions</h3>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('admin.services.create') }}" class="btn btn-outline-primary btn-sm">
                            <i class="ti ti-plus me-1"></i>Add Service
                        </a>
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-success btn-sm">
                            <i class="ti ti-briefcase me-1"></i>Manage Projects
                        </a>
                        <a href="{{ route('admin.pricing-packages.index') }}" class="btn btn-outline-info btn-sm">
                            <i class="ti ti-receipt me-1"></i>Manage Pricing
                        </a>
                        <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-outline-danger btn-sm">
                            <i class="ti ti-message me-1"></i>View Messages
                        </a>
                        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-warning btn-sm">
                            <i class="ti ti-star me-1"></i>Testimonials
                        </a>
                        <a href="{{ route('admin.faqs.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="ti ti-file-text me-1"></i>Manage FAQs
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-outline-dark btn-sm" target="_blank">
                            <i class="ti ti-external-link me-1"></i>View Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
