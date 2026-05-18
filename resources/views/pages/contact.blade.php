@extends('layouts.app')
@section('content')

<!-- Hero Section -->
<section class="hero section dark-background" style="padding: 80px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Contact Us</h1>
                <p>Get in touch with us for your software development needs</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>We'd love to hear from you. Send us a message!</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-5">
                <div class="info-wrap">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>Address</h3>
                            <p>{{ $contactAddress }}</p>
                        </div>
                    </div>

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Call Us</h3>
                            <p>{{ $contactPhone }}</p>
                        </div>
                    </div>

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-whatsapp flex-shrink-0"></i>
                        <div>
                            <h3>WhatsApp</h3>
                            <p>{{ $contactWhatsapp }}</p>
                        </div>
                    </div>

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                        <i class="bi bi-clock flex-shrink-0"></i>
                        <div>
                            <h3>Working Hours</h3>
                            <p>{{ $contactWorkingHours }}</p>
                        </div>
                    </div>

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="600">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Email Us</h3>
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
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required="" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control" placeholder="Your Email" required="" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <input type="text" name="subject" class="form-control" placeholder="Subject" value="{{ old('subject') }}">
                            @error('subject')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message" required="">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 text-center">
                            @if(session('success'))
                                <div class="sent-message">{{ session('success') }}</div>
                            @endif
                            <button type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
