@extends('layouts.app')
@section('content')

<!-- Hero Section -->
<section class="hero section dark-background" style="padding: 80px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>{{ __('messages.pricing_hero_title') }}</h1>
                <p>{{ __('messages.pricing_hero_subtitle') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section class="pricing section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ __('messages.pricing_section_title') }}</h2>
        <p>{{ __('messages.pricing_section_subtitle') }}</p>
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
                <h3>{{ __('messages.cta_quote_title') }}</h3>
                <p>{{ __('messages.cta_quote_desc') }}</p>
            </div>
            <div class="col-xl-3 cta-btn-container text-center">
                <a class="cta-btn align-middle" href="{{ route('contact') }}">{{ __('messages.cta_button') }}</a>
            </div>
        </div>
    </div>
</section>

@endsection
