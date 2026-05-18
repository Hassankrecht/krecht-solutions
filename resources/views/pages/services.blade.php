@extends('layouts.app')
@section('content')

<!-- Hero Section -->
<section class="hero section dark-background" style="padding: 80px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>{{ __('messages.services_hero_title') }}</h1>
                <p>{{ __('messages.services_hero_subtitle') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ __('messages.services_offer_title') }}</h2>
        <p>{{ __('messages.services_offer_subtitle') }}</p>
    </div>

    <div class="container">
        <div class="row gy-4">
            @if($services && $services->count() > 0)
                @foreach($services as $index => $service)
                    <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="{{ $service->icon }} icon"></i></div>
                            <h4>{{ $service->title }}</h4>
                            <p>{{ $service->short_description ?: Str::limit($service->description, 120) }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-globe icon"></i></div>
                        <h4>Website Development</h4>
                        <p>Custom website development using modern technologies like Laravel, React, and Bootstrap.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-phone icon"></i></div>
                        <h4>Flutter Mobile Applications</h4>
                        <p>Cross-platform mobile app development using Flutter for iOS and Android.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-speedometer2 icon"></i></div>
                        <h4>Laravel Dashboards</h4>
                        <p>Powerful admin dashboards and management systems built with Laravel.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-code-slash icon"></i></div>
                        <h4>API Development</h4>
                        <p>RESTful API development and integration for your applications.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-cart3 icon"></i></div>
                        <h4>POS Systems</h4>
                        <p>Point of Sale systems for retail and hospitality businesses.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-calculator icon"></i></div>
                        <h4>Stock & Accounting Systems</h4>
                        <p>Comprehensive stock management and accounting solutions.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="700">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-qr-code icon"></i></div>
                        <h4>QR Menu Systems</h4>
                        <p>Digital QR code menu systems for restaurants and cafes.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="800">
                    <div class="service-item position-relative">
                        <div class="icon"><i class="bi bi-headset icon"></i></div>
                        <h4>Technical Support & Maintenance</h4>
                        <p>Ongoing technical support and maintenance services.</p>
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
                <h3>{{ __('messages.cta_custom_title') }}</h3>
                <p>{{ __('messages.cta_custom_desc') }}</p>
            </div>
            <div class="col-xl-3 cta-btn-container text-center">
                <a class="cta-btn align-middle" href="{{ route('contact') }}">{{ __('messages.cta_custom_button') }}</a>
            </div>
        </div>
    </div>
</section>

@endsection
