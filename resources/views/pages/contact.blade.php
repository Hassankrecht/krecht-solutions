@extends('layouts.app')
@section('title', 'Contact Us - Krecht Solutions')
@section('meta_description', 'Get in touch with Krecht Solutions for your software development needs. Contact our team for a consultation and quote.')
@section('canonical_url', config('app.url') . '/contact')
@section('content')

<!-- Hero Section -->
<section class="hero section dark-background" style="padding: 80px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>{{ __('messages.contact_hero_title') }}</h1>
                <p>{{ __('messages.contact_hero_subtitle') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact section">
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ __('messages.contact_section_title') }}</h2>
        <p>{{ __('messages.contact_section_subtitle') }}</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-5">
                <div class="info-wrap">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>{{ __('messages.contact_address') }}</h3>
                            <p>{{ $contactAddress }}</p>
                        </div>
                    </div>

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>{{ __('messages.contact_call') }}</h3>
                            <p>{{ $contactPhone }}</p>
                        </div>
                    </div>

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-whatsapp flex-shrink-0"></i>
                        <div>
                            <h3>{{ __('messages.contact_whatsapp_label') }}</h3>
                            <p>{{ $contactWhatsapp }}</p>
                        </div>
                    </div>

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                        <i class="bi bi-clock flex-shrink-0"></i>
                        <div>
                            <h3>{{ __('messages.contact_hours') }}</h3>
                            <p>{{ $contactWorkingHours }}</p>
                        </div>
                    </div>

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="600">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>{{ __('messages.contact_email_label') }}</h3>
                            <p>{{ $contactEmail }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <form action="{{ route('contact.store') }}" method="post" data-aos="fade-up" data-aos-delay="200">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('messages.contact_name') }}" required="" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control" placeholder="{{ __('messages.contact_email') }}" required="" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <input type="text" name="subject" class="form-control" placeholder="{{ __('messages.contact_subject') }}" value="{{ old('subject') }}">
                            @error('subject')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <textarea class="form-control" name="message" rows="5" placeholder="{{ __('messages.contact_message') }}" required="">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 text-center">
                            @if(session('success'))
                                <div class="sent-message">{{ session('success') }}</div>
                            @endif
                            <button type="submit" class="btn-contact-submit">{{ __('messages.contact_send') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="container" data-aos="fade-up" data-aos-delay="300">
        <div class="row">
            <div class="col-12">
                <iframe
                    src="https://maps.google.com/maps?q=Sour,Lebanon&t=&z=13&ie=UTF8&iwloc=&output=embed"
                    width="100%"
                    height="400"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>

@endsection
