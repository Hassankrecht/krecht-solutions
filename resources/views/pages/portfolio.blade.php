@extends('layouts.app')
@section('content')

<!-- Hero Section -->
<section class="hero section dark-background" style="padding: 80px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Our Portfolio</h1>
                <p>Check out some of our recent projects</p>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section class="portfolio section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p>Explore our recent work and success stories</p>
    </div>

    <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">All</li>
                @if($categories && $categories->count() > 0)
                    @foreach($categories as $category)
                        <li data-filter=".filter-{{ Str::slug($category) }}">{{ $category }}</li>
                    @endforeach
                @endif
            </ul>

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                @if($projects && $projects->count() > 0)
                    @php
                        $categoryIcons = [
                            'Websites'         => 'bi-globe2',
                            'Dashboards'       => 'bi-speedometer2',
                            'POS Systems'      => 'bi-receipt-cutoff',
                            'Business Systems' => 'bi-briefcase',
                            'Mobile Apps'      => 'bi-phone',
                        ];
                        $categoryGradients = [
                            'Websites'         => 'linear-gradient(135deg,#0f2027,#203a43,#2c5364)',
                            'Dashboards'       => 'linear-gradient(135deg,#0d1b2a,#1b2838,#1b4f72)',
                            'POS Systems'      => 'linear-gradient(135deg,#1a1a2e,#16213e,#0f3460)',
                            'Business Systems' => 'linear-gradient(135deg,#0f1923,#1c2b3a,#274a6e)',
                            'Mobile Apps'      => 'linear-gradient(135deg,#1a0533,#2d1157,#4a1b8c)',
                        ];
                    @endphp
                    @foreach($projects as $index => $project)
                        @php
                            $icon     = $categoryIcons[$project->category]     ?? 'bi-code-square';
                            $gradient = $categoryGradients[$project->category] ?? 'linear-gradient(135deg,#1a1a2e,#16213e,#0f3460)';
                        @endphp
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ Str::slug($project->category) }}">
                            @if($project->image)
                                <img src="{{ asset($project->image) }}" class="img-fluid" alt="{{ $project->title }}">
                            @else
                                <div class="portfolio-placeholder" style="background:{{ $gradient }}">
                                    <div class="placeholder-inner">
                                        <i class="bi {{ $icon }}"></i>
                                        <span class="cs-badge">Coming Soon</span>
                                    </div>
                                </div>
                            @endif
                            <div class="portfolio-info">
                                <h4>{{ $project->title }}</h4>
                                <p>{{ $project->category }}</p>
                                @if($project->image)
                                    <a href="{{ asset($project->image) }}" title="{{ $project->title }}" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                @endif
                                <a href="{{ route('portfolio.show', $project) }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <p>No projects available yet. Check back soon!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="call-to-action section dark-background">
    <img src="{{ asset('assets/img/bg/bg-8.webp') }}" alt="">

    <div class="container">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-xl-9 text-center text-xl-start">
                <h3>Have a Project in Mind?</h3>
                <p>Let's discuss how we can help bring your vision to life.</p>
            </div>
            <div class="col-xl-3 cta-btn-container text-center">
                <a class="cta-btn align-middle" href="{{ route('contact') }}">Start a Project</a>
            </div>
        </div>
    </div>
</section>

@endsection
