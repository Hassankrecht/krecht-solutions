@extends('layouts.app')
@section('content')

<!-- Hero Section -->
<section class="hero section dark-background" style="padding: 80px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>About Us</h1>
                <p>{{ $siteName ?? 'Krecht Solutions' }} - Your Trusted Software Development Partner</p>
            </div>
        </div>
    </div>
</section>

<!-- About Content Section -->
<section class="about section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Who We Are</h2>
    </div>

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                <p>
                    {{ $siteName ?? 'Krecht Solutions' }} is a leading software development company specializing in custom web and mobile applications, business systems, and IT solutions. With years of experience in the industry, we have helped numerous businesses transform their digital presence and streamline their operations.
                </p>
                <ul>
                    <li><i class="bi bi-check2-circle"></i> <span>Expert team with years of experience in software development</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>Custom solutions tailored to your business needs</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>Modern technologies and best practices</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>Commitment to quality and customer satisfaction</span></li>
                </ul>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <p>We deliver high-quality software solutions that help businesses grow and succeed in the digital age. From websites and mobile apps to complex business systems, we have the expertise to bring your vision to life.</p>
                <p>Our team of skilled developers, designers, and project managers work closely with you to understand your requirements and deliver solutions that exceed your expectations.</p>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="section light-background">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="content">
                    <h3>Our Mission</h3>
                    <p>To provide innovative, high-quality software solutions that empower businesses to achieve their goals and thrive in the digital economy. We are committed to excellence, integrity, and customer satisfaction in everything we do.</p>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="content">
                    <h3>Our Vision</h3>
                    <p>To be the trusted partner for businesses seeking digital transformation, known for our expertise, reliability, and commitment to delivering exceptional results that drive growth and success.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technologies Section -->
<section class="section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Our Technologies</h2>
        <p>We use modern and proven technologies to build robust solutions</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
            <div class="col-lg-6 d-flex align-items-center">
                <img src="{{ asset('assets/img/illustration/illustration-10.webp') }}" class="img-fluid" alt="">
            </div>

            <div class="col-lg-6 pt-4 pt-lg-0 content">
                <div class="skills-content skills-animation">
                    <div class="progress">
                        <span class="skill"><span>Laravel</span> <i class="val">95%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill"><span>Flutter</span> <i class="val">90%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill"><span>React / Vue</span> <i class="val">85%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <div class="progress">
                        <span class="skill"><span>API Development</span> <i class="val">92%</i></span>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
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
                <h3>Ready to Work With Us?</h3>
                <p>Contact us today to discuss your project and let us help you achieve your business goals.</p>
            </div>
            <div class="col-xl-3 cta-btn-container text-center">
                <a class="cta-btn align-middle" href="{{ route('contact') }}">Contact Us</a>
            </div>
        </div>
    </div>
</section>

@endsection
