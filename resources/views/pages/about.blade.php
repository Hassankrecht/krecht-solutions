@extends('layouts.app')
@section('title', 'About Us - Krecht Solutions')
@section('meta_description', 'Learn about Krecht Solutions - our team, mission, and commitment to delivering exceptional software development services for your business.')
@section('canonical_url', config('app.url') . '/about')
@section('content')

<!-- Hero Section -->
<section class="hero section dark-background" style="padding: 80px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>{{ __('messages.about_hero_title') }}</h1>
                <p>{{ __('messages.about_hero_subtitle') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- About Content Section -->
<section class="about section">
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ __('messages.about_who_we_are') }}</h2>
    </div>

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                <p>
                    {{ $siteName ?? 'Krecht Solutions' }} {{ __('messages.about_description') }}
                </p>
                <ul>
                    <li><i class="bi bi-check2-circle"></i> <span>{{ __('messages.about_point_1') }}</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>{{ __('messages.about_point_2') }}</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>{{ __('messages.about_point_3') }}</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>{{ __('messages.about_point_4') }}</span></li>
                </ul>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <p>{{ __('messages.about_more_1') }}</p>
                <p>{{ __('messages.about_more_2') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="section light-background">
    <div class="container">
        <div class="row gy-4 text-center" data-aos="fade-up">
            <div class="col-lg-3 col-md-6">
                <div class="py-3">
                    <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--accent-color);">20+</h2>
                    <p class="mb-0">{{ __('messages.stat_projects') }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="py-3">
                    <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--accent-color);">5+</h2>
                    <p class="mb-0">{{ __('messages.stat_technologies') }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="py-3">
                    <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--accent-color);">3+</h2>
                    <p class="mb-0">{{ __('messages.stat_experience') }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="py-3">
                    <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--accent-color);">100%</h2>
                    <p class="mb-0">{{ __('messages.stat_custom') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="section">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="content">
                    <h3>{{ __('messages.mission_title') }}</h3>
                    <p>{{ __('messages.mission_desc') }}</p>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="content">
                    <h3>{{ __('messages.vision_title') }}</h3>
                    <p>{{ __('messages.vision_desc') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What We Build Section -->
<section class="services section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ __('messages.what_we_build_title') }}</h2>
        <p>{{ __('messages.what_we_build_subtitle') }}</p>
    </div>

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-globe icon"></i></div>
                    <h4>{{ __('messages.service_web') }}</h4>
                    <p>{{ __('messages.service_web_desc') }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-phone icon"></i></div>
                    <h4>{{ __('messages.service_mobile') }}</h4>
                    <p>{{ __('messages.service_mobile_desc') }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-speedometer2 icon"></i></div>
                    <h4>{{ __('messages.service_dashboards') }}</h4>
                    <p>{{ __('messages.service_dashboards_desc') }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-receipt icon"></i></div>
                    <h4>{{ __('messages.service_pos') }}</h4>
                    <p>{{ __('messages.service_pos_desc') }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="500">
                <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-code-slash icon"></i></div>
                    <h4>{{ __('messages.service_apis') }}</h4>
                    <p>{{ __('messages.service_apis_desc') }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="600">
                <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-gear icon"></i></div>
                    <h4>{{ __('messages.service_business') }}</h4>
                    <p>{{ __('messages.service_business_desc') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technologies Section -->
<section class="skills section">
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ __('messages.technologies_title') }}</h2>
        <p>{{ __('messages.technologies_subtitle') }}</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
            <div class="col-lg-6 d-flex align-items-center">
                <img src="{{ str_replace(' ', '%20', asset('assets/projects/Albasha restaurant/dashboard page.png')) }}" class="img-fluid rounded" alt="Sample dashboard built by Krecht Solutions">
            </div>

            <div class="col-lg-6 pt-4 pt-lg-0 content">
                <div class="skills-content skills-animation">
                    <div class="progress">
                        <span class="skill"><span>Laravel (PHP)</span> <i class="val">95%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill"><span>Flutter (Dart)</span> <i class="val">90%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill"><span>MySQL &amp; Database Design</span> <i class="val">88%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill"><span>REST API Development</span> <i class="val">92%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill"><span>Bootstrap &amp; Frontend</span> <i class="val">85%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ __('messages.why_choose_title') }}</h2>
        <p>{{ __('messages.why_choose_subtitle') }}</p>
    </div>

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="d-flex align-items-start mb-4">
                    <i class="bi bi-patch-check-fill flex-shrink-0 me-3" style="font-size: 1.5rem; color: var(--accent-color);"></i>
                    <div>
                        <h5 class="mb-1">{{ __('messages.why_choose_1_title') }}</h5>
                        <p class="mb-0">{{ __('messages.why_choose_1_desc') }}</p>
                    </div>
                </div>
                <div class="d-flex align-items-start mb-4">
                    <i class="bi bi-patch-check-fill flex-shrink-0 me-3" style="font-size: 1.5rem; color: var(--accent-color);"></i>
                    <div>
                        <h5 class="mb-1">{{ __('messages.why_choose_2_title') }}</h5>
                        <p class="mb-0">{{ __('messages.why_choose_2_desc') }}</p>
                    </div>
                </div>
                <div class="d-flex align-items-start mb-4">
                    <i class="bi bi-patch-check-fill flex-shrink-0 me-3" style="font-size: 1.5rem; color: var(--accent-color);"></i>
                    <div>
                        <h5 class="mb-1">{{ __('messages.why_choose_3_title') }}</h5>
                        <p class="mb-0">{{ __('messages.why_choose_3_desc') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="d-flex align-items-start mb-4">
                    <i class="bi bi-patch-check-fill flex-shrink-0 me-3" style="font-size: 1.5rem; color: var(--accent-color);"></i>
                    <div>
                        <h5 class="mb-1">{{ __('messages.why_choose_4_title') }}</h5>
                        <p class="mb-0">{{ __('messages.why_choose_4_desc') }}</p>
                    </div>
                </div>
                <div class="d-flex align-items-start mb-4">
                    <i class="bi bi-patch-check-fill flex-shrink-0 me-3" style="font-size: 1.5rem; color: var(--accent-color);"></i>
                    <div>
                        <h5 class="mb-1">{{ __('messages.why_choose_5_title') }}</h5>
                        <p class="mb-0">{{ __('messages.why_choose_5_desc') }}</p>
                    </div>
                </div>
                <div class="d-flex align-items-start mb-4">
                    <i class="bi bi-patch-check-fill flex-shrink-0 me-3" style="font-size: 1.5rem; color: var(--accent-color);"></i>
                    <div>
                        <h5 class="mb-1">{{ __('messages.why_choose_6_title') }}</h5>
                        <p class="mb-0">{{ __('messages.why_choose_6_desc') }}</p>
                    </div>
                </div>
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
                <h3>{{ __('messages.cta_project_title') }}</h3>
                <p>{{ __('messages.cta_project_desc') }}</p>
            </div>
            <div class="col-xl-3 cta-btn-container text-center">
                <a class="cta-btn align-middle" href="{{ route('contact') }}">{{ __('messages.cta_project_button') }}</a>
            </div>
        </div>
    </div>
</section>

@endsection
