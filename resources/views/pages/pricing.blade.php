@extends('layouts.app')
@section('content')

<!-- Hero Section -->
<section class="hero section dark-background" style="padding: 80px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Pricing Packages</h1>
                <p>Choose the package that fits your business needs</p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="pricing section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>Our Pricing</h2>
        <p>Flexible pricing options for businesses of all sizes</p>
    </div>

    <div class="container">
        <div class="row gy-4">
            @if($packages && $packages->count() > 0)
                @foreach($packages as $index => $package)
                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="{{ ($index + 1) * 100 }}">
                        <div class="pricing-item {{ $package->is_featured ? 'featured' : '' }}">
                            <h3>{{ $package->name }}</h3>
                            <h4>{{ $package->price }}</h4>
                            <ul>
                                @if(is_array($package->features))
                                    @foreach($package->features as $feature)
                                        <li><i class="bi bi-check"></i> <span>{{ $feature }}</span></li>
                                    @endforeach
                                @endif
                            </ul>
                            <a href="{{ route('contact') }}" class="buy-btn">Get Started</a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="pricing-item">
                        <h3>Starter Package</h3>
                        <h4>$499</h4>
                        <ul>
                            <li><i class="bi bi-check"></i> <span>Landing page</span></li>
                            <li><i class="bi bi-check"></i> <span>Responsive design</span></li>
                            <li><i class="bi bi-check"></i> <span>Contact form</span></li>
                            <li><i class="bi bi-check"></i> <span>Basic SEO</span></li>
                            <li><i class="bi bi-check"></i> <span>1 month support</span></li>
                        </ul>
                        <a href="{{ route('contact') }}" class="buy-btn">Get Started</a>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="pricing-item featured">
                        <h3>Business Package</h3>
                        <h4>$1,499</h4>
                        <ul>
                            <li><i class="bi bi-check"></i> <span>Multi-page website (5-10 pages)</span></li>
                            <li><i class="bi bi-check"></i> <span>Admin dashboard</span></li>
                            <li><i class="bi bi-check"></i> <span>Authentication system</span></li>
                            <li><i class="bi bi-check"></i> <span>API integration</span></li>
                            <li><i class="bi bi-check"></i> <span>3 months support</span></li>
                        </ul>
                        <a href="{{ route('contact') }}" class="buy-btn">Get Started</a>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="pricing-item">
                        <h3>Enterprise Package</h3>
                        <h4>$4,999</h4>
                        <ul>
                            <li><i class="bi bi-check"></i> <span>Custom business system</span></li>
                            <li><i class="bi bi-check"></i> <span>Mobile application (Flutter)</span></li>
                            <li><i class="bi bi-check"></i> <span>Advanced dashboard</span></li>
                            <li><i class="bi bi-check"></i> <span>APIs and database</span></li>
                            <li><i class="bi bi-check"></i> <span>6 months support</span></li>
                        </ul>
                        <a href="{{ route('contact') }}" class="buy-btn">Get Started</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="call-to-action section dark-background">
    <img src="{{ asset('assets/img/bg/bg-8.webp') }}" alt="">

    <div class="container">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-xl-9 text-center text-xl-start">
                <h3>Need a Custom Quote?</h3>
                <p>Contact us for a personalized quote based on your specific requirements.</p>
            </div>
            <div class="col-xl-3 cta-btn-container text-center">
                <a class="cta-btn align-middle" href="{{ route('contact') }}">Contact Us</a>
            </div>
        </div>
    </div>
</section>

@endsection
