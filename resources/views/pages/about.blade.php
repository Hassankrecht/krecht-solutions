@extends('layouts.app')
@section('content')

<!-- Hero Section -->
<section class="hero section dark-background" style="padding: 80px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>About Us</h1>
                <p>We build software that solves real business problems — using Laravel, Flutter, and a focus on long-term quality.</p>
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
                    {{ $siteName ?? 'Krecht Solutions' }} is a software development company that builds custom web applications, mobile apps, and business systems. We work with businesses to replace manual processes, outdated tools, and disconnected systems with software that fits the way they actually operate.
                </p>
                <ul>
                    <li><i class="bi bi-check2-circle"></i> <span>Laravel-powered web applications and admin panels</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>Flutter mobile apps for Android and iOS</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>POS systems, dashboards &amp; business management tools</span></li>
                    <li><i class="bi bi-check2-circle"></i> <span>REST APIs connecting web, mobile &amp; third-party services</span></li>
                </ul>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <p>We're a focused team of developers who care about clean, maintainable code. We don't just build features — we help you think through the architecture so that your software can grow with your business over time.</p>
                <p>From the first conversation to post-launch support, we stay involved and communicate clearly at every stage of the project.</p>
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
                    <p class="mb-0">Projects Delivered</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="py-3">
                    <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--accent-color);">5+</h2>
                    <p class="mb-0">Core Technologies</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="py-3">
                    <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--accent-color);">3+</h2>
                    <p class="mb-0">Years of Experience</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="py-3">
                    <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--accent-color);">100%</h2>
                    <p class="mb-0">Custom-Built Solutions</p>
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
                    <h3>Our Mission</h3>
                    <p>To build practical, well-crafted software that helps businesses run more efficiently. We focus on understanding real problems first, then writing clean, reliable code that solves them — without unnecessary complexity.</p>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="content">
                    <h3>Our Vision</h3>
                    <p>To be the go-to development partner for businesses that want software built right the first time. We aim to build long-term relationships with our clients — not just deliver a project and disappear.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What We Build Section -->
<section class="services section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>What We Build</h2>
        <p>Practical software solutions for businesses of different sizes and industries</p>
    </div>

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-globe icon"></i></div>
                    <h4>Web Applications</h4>
                    <p>Custom Laravel-powered web apps with admin panels, user management, and reporting built around your specific workflows.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-phone icon"></i></div>
                    <h4>Mobile Apps</h4>
                    <p>Flutter apps that run natively on Android and iOS, connected to your backend via REST APIs for real-time data sync.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-speedometer2 icon"></i></div>
                    <h4>Business Dashboards</h4>
                    <p>Admin dashboards with data visualizations, role-based access, and real-time reporting to keep you in control of your operations.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-receipt icon"></i></div>
                    <h4>POS Systems</h4>
                    <p>Point-of-sale solutions for retail and food businesses with inventory tracking, order management, and sales reporting.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="500">
                <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-code-slash icon"></i></div>
                    <h4>REST APIs</h4>
                    <p>Well-structured APIs that connect your web app, mobile app, and third-party services in a consistent, secure way.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="600">
                <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-gear icon"></i></div>
                    <h4>Business Systems</h4>
                    <p>Custom booking platforms, reservation tools, management software, and ERP-style systems tailored to your operations.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technologies Section -->
<section class="skills section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Technologies We Use</h2>
        <p>Proven, modern tools with strong ecosystems — built for reliability and long-term maintainability</p>
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
        <h2>Why Choose Krecht Solutions</h2>
        <p>What working with us actually looks like</p>
    </div>

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="d-flex align-items-start mb-4">
                    <i class="bi bi-patch-check-fill flex-shrink-0 me-3" style="font-size: 1.5rem; color: var(--accent-color);"></i>
                    <div>
                        <h5 class="mb-1">Built for your business, not a template</h5>
                        <p class="mb-0">Every system is designed around how your business operates — no generic solutions, no shortcuts.</p>
                    </div>
                </div>
                <div class="d-flex align-items-start mb-4">
                    <i class="bi bi-patch-check-fill flex-shrink-0 me-3" style="font-size: 1.5rem; color: var(--accent-color);"></i>
                    <div>
                        <h5 class="mb-1">Clean, maintainable code</h5>
                        <p class="mb-0">We follow proper architecture patterns so your software is straightforward to extend, update, or hand off.</p>
                    </div>
                </div>
                <div class="d-flex align-items-start mb-4">
                    <i class="bi bi-patch-check-fill flex-shrink-0 me-3" style="font-size: 1.5rem; color: var(--accent-color);"></i>
                    <div>
                        <h5 class="mb-1">Full-stack capability</h5>
                        <p class="mb-0">Web backend, frontend, mobile app, and API — we handle the full technology stack so you work with one team.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="d-flex align-items-start mb-4">
                    <i class="bi bi-patch-check-fill flex-shrink-0 me-3" style="font-size: 1.5rem; color: var(--accent-color);"></i>
                    <div>
                        <h5 class="mb-1">Clear communication throughout</h5>
                        <p class="mb-0">We keep you informed at every project stage — no surprises, no missed milestones without notice.</p>
                    </div>
                </div>
                <div class="d-flex align-items-start mb-4">
                    <i class="bi bi-patch-check-fill flex-shrink-0 me-3" style="font-size: 1.5rem; color: var(--accent-color);"></i>
                    <div>
                        <h5 class="mb-1">Post-launch support</h5>
                        <p class="mb-0">We stay available after deployment for bug fixes, feature additions, and technical guidance as your business grows.</p>
                    </div>
                </div>
                <div class="d-flex align-items-start mb-4">
                    <i class="bi bi-patch-check-fill flex-shrink-0 me-3" style="font-size: 1.5rem; color: var(--accent-color);"></i>
                    <div>
                        <h5 class="mb-1">Practical technology choices</h5>
                        <p class="mb-0">We use Laravel, Flutter, and MySQL — battle-tested tools with strong communities that won't become obsolete overnight.</p>
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
                <h3>Have a Project in Mind?</h3>
                <p>Tell us what you're trying to build and we'll help you figure out the best approach — no pressure, no jargon.</p>
            </div>
            <div class="col-xl-3 cta-btn-container text-center">
                <a class="cta-btn align-middle" href="{{ route('contact') }}">Get in Touch</a>
            </div>
        </div>
    </div>
</section>

@endsection
