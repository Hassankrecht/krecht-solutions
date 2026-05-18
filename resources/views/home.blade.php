@extends('layouts.app')
@section('content')

 <section id="hero" class="hero section dark-background">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1>{{ $siteTagline ?? 'Custom Software Solutions for Modern Businesses' }}</h1>
            <p>We build modern websites, mobile apps, dashboards, and business systems tailored to your workflow.</p>
            <div class="d-flex">
              <a href="{{ route('services') }}" class="btn-get-started">Get Started</a>
              <a href="{{ route('portfolio') }}" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>View Portfolio</span></a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="{{ asset('assets/img/hero/hero-it.svg') }}" class="img-fluid animated" alt="Custom software development illustration – Krecht Solutions">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Clients Section -->
    <section id="clients" class="clients section light-background">

      <div class="container" data-aos="zoom-in">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 5,
                  "spaceBetween": 120
                },
                "1200": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/clients-1.webp') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/clients-2.webp') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/clients-3.webp') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/clients-4.webp') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/clients-5.webp') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/clients-6.webp') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/clients-7.webp') }}" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/img/clients/clients-8.webp') }}" class="img-fluid" alt=""></div>
          </div>
        </div>

      </div>

    </section><!-- /Clients Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About Us</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p>
              {{ $siteName ?? 'Krecht Solutions' }} is a leading software development company specializing in custom web and mobile applications, business systems, and IT solutions.
            </p>
            <ul>
              <li><i class="bi bi-check2-circle"></i> <span>Expert team with years of experience in software development</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Custom solutions tailored to your business needs</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Modern technologies and best practices</span></li>
            </ul>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p>We deliver high-quality software solutions that help businesses grow and succeed in the digital age. From websites and mobile apps to complex business systems, we have the expertise to bring your vision to life.</p>
            <a href="{{ route('about') }}" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="section why-us light-background" data-builder="section">

      <div class="container-fluid">

        <div class="row gy-4">

          <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

            <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
              <h3><span>Why Businesses </span><strong>Choose Krecht Solutions</strong></h3>
              <p>
                We build custom software that fits your business — from Laravel-powered web systems and Flutter mobile apps to dashboards, APIs, and integrations. Every solution is designed to scale, with long-term support so your team is never left behind.
              </p>
            </div>

            <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">
              @if($faqs && $faqs->count() > 0)
                @foreach($faqs as $index => $faq)
                  <div class="faq-item {{ $index === 0 ? 'faq-active' : '' }}">
                    <h3><span>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span> {{ $faq->question }}</h3>
                    <div class="faq-content">
                      <p>{{ $faq->answer }}</p>
                    </div>
                    <i class="faq-toggle bi bi-chevron-right"></i>
                  </div><!-- End Faq item-->
                @endforeach
              @else
                <div class="faq-item faq-active">
                  <h3><span>01</span> What technologies do you build with?</h3>
                  <div class="faq-content">
                    <p>We specialise in Laravel for backend and web applications, and Flutter for cross-platform mobile apps. We also work with MySQL, REST APIs, Bootstrap, and Vue.js — chosen for reliability, performance, and long-term maintainability.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>
                <div class="faq-item">
                  <h3><span>02</span> How long does a typical project take?</h3>
                  <div class="faq-content">
                    <p>Timelines depend on scope. A focused landing page or simple system is typically 1–2 weeks, while a full business dashboard or mobile app runs 4–10 weeks. We provide a detailed estimate after our initial discovery session.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>
                <div class="faq-item">
                  <h3><span>03</span> Can you build a custom dashboard or admin panel?</h3>
                  <div class="faq-content">
                    <p>Yes. We build role-based admin dashboards tailored to your workflow — including reporting, data management, user permissions, and real-time analytics. Every dashboard is built custom, not from a generic template.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>
                <div class="faq-item">
                  <h3><span>04</span> Do you provide support after launch?</h3>
                  <div class="faq-content">
                    <p>Absolutely. We offer ongoing maintenance and support packages covering bug fixes, feature updates, performance monitoring, and security patches — so your system stays reliable as your business grows.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>
                <div class="faq-item">
                  <h3><span>05</span> Can you integrate with our existing systems or third-party APIs?</h3>
                  <div class="faq-content">
                    <p>Yes. API integration is a core part of what we do — whether connecting to payment gateways, ERP platforms, logistics providers, or any REST-based service. We can also build the API layer that your mobile app or external partners consume.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>
              @endif
            </div>

          </div>

          <div class="col-lg-5 order-1 order-lg-2 why-us-img">
            <img src="{{ asset('assets/img/faq/faq-illustration.svg') }}" class="img-fluid" alt="Krecht Solutions software development team collaboration" data-aos="zoom-in" data-aos-delay="100">
          </div>
        </div>

      </div>

    </section><!-- /Why Us Section -->

    <!-- Skills Section -->
    <section id="skills" class="skills section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">

          <div class="col-lg-6 d-flex align-items-center">
            <img src="{{ asset('assets/img/expertise/expertise-dashboard.svg') }}" class="img-fluid" alt="Software analytics dashboard – Krecht Solutions">
          </div>

          <div class="col-lg-6 pt-4 pt-lg-0 content">

            <h3>Our Expertise</h3>
            <p>
              Krecht Solutions specialises in Laravel-powered web systems, Flutter mobile apps, custom business dashboards, and REST API integrations. We architect scalable databases and write clean, maintainable code — delivering software built to grow with your business.
            </p>

            <div class="skills-content skills-animation">

              <div class="progress">
                <span class="skill"><span>Laravel Development</span></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>Flutter Applications</span></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>Business Dashboards</span></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>REST API Integration</span></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>POS &amp; Management Systems</span></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>Database Architecture</span></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

            </div>

          </div>
        </div>

      </div>

    </section><!-- /Skills Section -->

    <!-- Services Section -->
    <section id="services" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>Comprehensive software solutions for your business needs</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          @if($services && $services->count() > 0)
            @foreach($services as $index => $service)
              <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                <div class="service-item position-relative">
                  <div class="icon"><i class="{{ $service->icon }} icon"></i></div>
                  <h4><a href="{{ route('services') }}" class="stretched-link">{{ $service->title }}</a></h4>
                  <p>{{ $service->short_description }}</p>
                </div>
              </div><!-- End Service Item -->
            @endforeach
          @else
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-window-stack icon"></i></div>
                <h4><a href="{{ route('services') }}" class="stretched-link">Website Development</a></h4>
                <p>Responsive, fast, and secure websites tailored to your business needs.</p>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-phone-landscape icon"></i></div>
                <h4><a href="{{ route('services') }}" class="stretched-link">Flutter Mobile Applications</a></h4>
                <p>Cross-platform mobile apps for iOS and Android from a single codebase.</p>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-layout-sidebar icon"></i></div>
                <h4><a href="{{ route('services') }}" class="stretched-link">Laravel Dashboards</a></h4>
                <p>Feature-rich admin dashboards and management systems built with Laravel.</p>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-braces-asterisk icon"></i></div>
                <h4><a href="{{ route('services') }}" class="stretched-link">API Development</a></h4>
                <p>Robust, secure, and well-documented APIs for your applications.</p>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="500">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-receipt-cutoff icon"></i></div>
                <h4><a href="{{ route('services') }}" class="stretched-link">POS Systems</a></h4>
                <p>Complete POS solutions with inventory, sales tracking, and reporting.</p>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="600">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-graph-up-arrow icon"></i></div>
                <h4><a href="{{ route('services') }}" class="stretched-link">Stock &amp; Accounting Systems</a></h4>
                <p>Track inventory, manage finances, and generate detailed business reports.</p>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="700">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-qr-code-scan icon"></i></div>
                <h4><a href="{{ route('services') }}" class="stretched-link">QR Menu Systems</a></h4>
                <p>Contactless digital menus for restaurants and cafes.</p>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="800">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-wrench-adjustable-circle icon"></i></div>
                <h4><a href="{{ route('services') }}" class="stretched-link">Technical Support &amp; Maintenance</a></h4>
                <p>Expert support to keep your systems running smoothly and reliably.</p>
              </div>
            </div>
          @endif
        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Work Process Section -->
    <section id="work-process" class="work-process section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Work Process</h2>
        <p>From initial discovery through to deployment, we follow a clear process that keeps projects on track and stakeholders informed.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="steps-item">
              <div class="steps-image">
                <img src="{{ asset('assets/img/steps/steps-1.webp') }}" alt="Research and analysis – understanding your business goals and requirements" class="img-fluid" loading="lazy">
              </div>
              <div class="steps-content">
                <div class="steps-number">01</div>
                <h3>Research &amp; Analysis</h3>
                <p>We start by understanding your business, your users, and your goals — mapping every requirement before a single line of code is written.</p>
                <div class="steps-features">
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Market Research</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Data Analysis</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>User Feedback</span>
                  </div>
                </div>
              </div>
            </div><!-- End Steps Item -->
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="steps-item">
              <div class="steps-image">
                <img src="{{ asset('assets/img/steps/steps-2.webp') }}" alt="Design and planning – wireframes, UI/UX design and technical architecture" class="img-fluid" loading="lazy">
              </div>
              <div class="steps-content">
                <div class="steps-number">02</div>
                <h3>Design &amp; Planning</h3>
                <p>We produce clean wireframes and define the technical architecture — aligning the solution with your workflow before development begins.</p>
                <div class="steps-features">
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Wireframing</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>UI/UX Design</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Prototyping</span>
                  </div>
                </div>
              </div>
            </div><!-- End Steps Item -->
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="steps-item">
              <div class="steps-image">
                <img src="{{ asset('assets/img/steps/steps-3.webp') }}" alt="Development and launch – building, testing and deploying your solution" class="img-fluid" loading="lazy">
              </div>
              <div class="steps-content">
                <div class="steps-number">03</div>
                <h3>Development &amp; Launch</h3>
                <p>We build, test, and deploy your solution — then remain available for ongoing support and iterations as your business grows.</p>
                <div class="steps-features">
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Development</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Testing</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>Deployment</span>
                  </div>
                </div>
              </div>
            </div><!-- End Steps Item -->
          </div>

        </div>

      </div>

    </section><!-- /Work Process Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">

      <img src="{{ asset('assets/img/bg/bg-8.webp') }}" alt="">

      <div class="container">

        <div class="row" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-9 text-center text-xl-start">
            <h3>Ready to Start Your Project?</h3>
            <p>Contact us today to discuss your software development needs and let us help you bring your vision to life.</p>
          </div>
          <div class="col-xl-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="{{ route('contact') }}">Contact Us</a>
          </div>
        </div>

      </div>

    </section><!-- /Call To Action Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p>Check out some of our recent projects</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            @if($projects && $projects->count() > 0)
              @foreach($projects->pluck('category')->unique() as $category)
                <li data-filter=".filter-{{ Str::slug($category) }}">{{ $category }}</li>
              @endforeach
            @endif
          </ul><!-- End Portfolio Filters -->

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
                    <a href="{{ route('portfolio') }}" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div><!-- End Portfolio Item -->
              @endforeach
            @else
              <div class="col-12 text-center">
                <p>No projects available yet. Check back soon!</p>
              </div>
            @endif
          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->


    <!-- Pricing Section -->
    <section id="pricing" class="pricing section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pricing</h2>
        <p>Choose the package that fits your needs</p>
      </div><!-- End Section Title -->

      <div class="container">
        @include('partials.pricing-packages')
      </div>

    </section><!-- /Pricing Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>What our clients say about us</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
          <div class="swiper-wrapper">
            @if($testimonials && $testimonials->count() > 0)
              @foreach($testimonials as $testimonial)
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <img src="{{ $testimonial->image ? asset($testimonial->image) : asset('assets/img/person/person-m-9.webp') }}" class="testimonial-img" alt="">
                    <h3>{{ $testimonial->name }}</h3>
                    <h4>{{ $testimonial->position }}{{ $testimonial->company ? ' at ' . $testimonial->company : '' }}</h4>
                    <div class="stars">
                      @for($i = 0; $i < $testimonial->rating; $i++)
                        <i class="bi bi-star-fill"></i>
                      @endfor
                    </div>
                    <p>
                      <i class="bi bi-quote quote-icon-left"></i>
                      <span>{{ $testimonial->content }}</span>
                      <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                  </div>
                </div><!-- End testimonial item -->
              @endforeach
            @else
              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="{{ asset('assets/img/person/person-m-9.webp') }}" class="testimonial-img" alt="">
                  <h3>Client Name</h3>
                  <h4>Position at Company</h4>
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>No testimonials available yet. Be the first to share your experience!</span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div>
            @endif
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->


    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Get in touch with us for your software development needs</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p>{{ \App\Models\SiteSetting::get('contact_address', '123 Business Avenue, Tech City, TC 12345') }}</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>{{ \App\Models\SiteSetting::get('contact_phone', '+1 555 123 4567') }}</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>{{ \App\Models\SiteSetting::get('contact_email', 'info@krecht-solutions.com') }}</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                <i class="bi bi-clock flex-shrink-0"></i>
                <div>
                  <h3>Open Hours</h3>
                  <p><strong>Mon-Fri:</strong> 9AM - 6PM;
                  <strong>Sat-Sun:</strong> Closed</p>
                </div>
              </div><!-- End Info Item -->

            </div>
          </div>

          <div class="col-lg-7">
            <form action="{{ route('contact.store') }}" method="post" data-aos="fade-up" data-aos-delay="200">
              @csrf
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                  @error('name')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-6 ">
                  <input type="email" name="email" class="form-control" placeholder="Your Email" required="">
                  @error('email')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-12">
                  <input type="text" name="subject" class="form-control" placeholder="Subject">
                  @error('subject')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required=""></textarea>
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

    </section><!-- /Contact Section -->

  @endsection
