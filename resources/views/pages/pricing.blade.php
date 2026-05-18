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
        @include('partials.pricing-packages', ['pricingPackages' => $packages])
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
