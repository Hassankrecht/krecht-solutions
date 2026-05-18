@extends('layouts.app')
@section('content')

 <section id="hero" class="hero section dark-background">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1>{{ $siteTagline ?? __('messages.hero_title') }}</h1>
            <p>{{ __('messages.hero_description') }}</p>
            <div class="d-flex">
              <a href="{{ route('services') }}" class="btn-get-started">{{ __('messages.hero_get_started') }}</a>
              <a href="{{ route('portfolio') }}" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>{{ __('messages.hero_view_portfolio') }}</span></a>
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
        <h2>{{ __('messages.about_title') }}</h2>
      </div><!-- End Section Title -->

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
            </ul>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p>{{ __('messages.about_more_description') }}</p>
            <a href="{{ route('about') }}" class="read-more"><span>{{ __('messages.about_read_more') }}</span><i class="bi bi-arrow-right"></i></a>
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
              <h3><span>{{ __('messages.why_us_title') }} </span><strong>{{ __('messages.why_us_title_highlight') }}</strong></h3>
              <p>
                {{ __('messages.why_us_description') }}
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
                  <h3><span>01</span> {{ __('messages.faq_default_1_question') }}</h3>
                  <div class="faq-content">
                    <p>{{ __('messages.faq_default_1_answer') }}</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>
                <div class="faq-item">
                  <h3><span>02</span> {{ __('messages.faq_default_2_question') }}</h3>
                  <div class="faq-content">
                    <p>{{ __('messages.faq_default_2_answer') }}</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>
                <div class="faq-item">
                  <h3><span>03</span> {{ __('messages.faq_default_3_question') }}</h3>
                  <div class="faq-content">
                    <p>{{ __('messages.faq_default_3_answer') }}</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>
                <div class="faq-item">
                  <h3><span>04</span> {{ __('messages.faq_default_4_question') }}</h3>
                  <div class="faq-content">
                    <p>{{ __('messages.faq_default_4_answer') }}</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div>
                <div class="faq-item">
                  <h3><span>05</span> {{ __('messages.faq_default_5_question') }}</h3>
                  <div class="faq-content">
                    <p>{{ __('messages.faq_default_5_answer') }}</p>
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

            <h3>{{ __('messages.expertise_title') }}</h3>
            <p>
              {{ __('messages.expertise_description') }}
            </p>

            <div class="skills-content skills-animation">

              <div class="progress">
                <span class="skill"><span>{{ __('messages.skill_laravel') }}</span></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>{{ __('messages.skill_flutter') }}</span></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>{{ __('messages.skill_dashboards') }}</span></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>{{ __('messages.skill_api') }}</span></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>{{ __('messages.skill_pos') }}</span></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div><!-- End Skills Item -->

              <div class="progress">
                <span class="skill"><span>{{ __('messages.skill_database') }}</span></span>
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
        <h2>{{ __('messages.services_title') }}</h2>
        <p>{{ __('messages.services_subtitle') }}</p>
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
                <h4><a href="{{ route('services') }}" class="stretched-link">{{ __('messages.service_website_title') }}</a></h4>
                <p>{{ __('messages.service_website_desc') }}</p>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-phone-landscape icon"></i></div>
                <h4><a href="{{ route('services') }}" class="stretched-link">{{ __('messages.service_mobile_title') }}</a></h4>
                <p>{{ __('messages.service_mobile_desc') }}</p>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-layout-sidebar icon"></i></div>
                <h4><a href="{{ route('services') }}" class="stretched-link">{{ __('messages.service_dashboard_title') }}</a></h4>
                <p>{{ __('messages.service_dashboard_desc') }}</p>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-braces-asterisk icon"></i></div>
                <h4><a href="{{ route('services') }}" class="stretched-link">{{ __('messages.service_api_title') }}</a></h4>
                <p>{{ __('messages.service_api_desc') }}</p>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="500">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-receipt-cutoff icon"></i></div>
                <h4><a href="{{ route('services') }}" class="stretched-link">{{ __('messages.service_pos_title') }}</a></h4>
                <p>{{ __('messages.service_pos_desc') }}</p>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="600">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-graph-up-arrow icon"></i></div>
                <h4><a href="{{ route('services') }}" class="stretched-link">{{ __('messages.service_stock_title') }}</a></h4>
                <p>{{ __('messages.service_stock_desc') }}</p>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="700">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-qr-code-scan icon"></i></div>
                <h4><a href="{{ route('services') }}" class="stretched-link">{{ __('messages.service_qr_title') }}</a></h4>
                <p>{{ __('messages.service_qr_desc') }}</p>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="800">
              <div class="service-item position-relative">
                <div class="icon"><i class="bi bi-wrench-adjustable-circle icon"></i></div>
                <h4><a href="{{ route('services') }}" class="stretched-link">{{ __('messages.service_support_title') }}</a></h4>
                <p>{{ __('messages.service_support_desc') }}</p>
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
        <h2>{{ __('messages.process_title') }}</h2>
        <p>{{ __('messages.process_subtitle') }}</p>
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
                <h3>{{ __('messages.process_step_1_title') }}</h3>
                <p>{{ __('messages.process_step_1_desc') }}</p>
                <div class="steps-features">
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>{{ __('messages.process_step_1_feature_1') }}</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>{{ __('messages.process_step_1_feature_2') }}</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>{{ __('messages.process_step_1_feature_3') }}</span>
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
                <h3>{{ __('messages.process_step_2_title') }}</h3>
                <p>{{ __('messages.process_step_2_desc') }}</p>
                <div class="steps-features">
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>{{ __('messages.process_step_2_feature_1') }}</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>{{ __('messages.process_step_2_feature_2') }}</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>{{ __('messages.process_step_2_feature_3') }}</span>
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
                <h3>{{ __('messages.process_step_3_title') }}</h3>
                <p>{{ __('messages.process_step_3_desc') }}</p>
                <div class="steps-features">
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>{{ __('messages.process_step_3_feature_1') }}</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>{{ __('messages.process_step_3_feature_2') }}</span>
                  </div>
                  <div class="feature-item">
                    <i class="bi bi-check-circle"></i>
                    <span>{{ __('messages.process_step_3_feature_3') }}</span>
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
            <h3>{{ __('messages.cta_title') }}</h3>
            <p>{{ __('messages.cta_description') }}</p>
          </div>
          <div class="col-xl-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="{{ route('contact') }}">{{ __('messages.cta_button') }}</a>
          </div>
        </div>

      </div>

    </section><!-- /Call To Action Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>{{ __('messages.portfolio_title') }}</h2>
        <p>{{ __('messages.portfolio_subtitle') }}</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">{{ __('messages.portfolio_filter_all') }}</li>
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
                        <span class="cs-badge">{{ __('messages.portfolio_coming_soon') }}</span>
                      </div>
                    </div>
                  @endif
                  <div class="portfolio-info">
                    <h4>{{ $project->title }}</h4>
                    <p>{{ $project->category }}</p>
                    @if($project->image)
                      <a href="{{ asset($project->image) }}" title="{{ $project->title }}" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    @endif
                    <a href="{{ route('portfolio') }}" title="{{ __('messages.portfolio_more_details') }}" class="details-link"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div><!-- End Portfolio Item -->
              @endforeach
            @else
              <div class="col-12 text-center">
                <p>{{ __('messages.portfolio_no_projects') }}</p>
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
        <h2>{{ __('messages.pricing_title') }}</h2>
        <p>{{ __('messages.pricing_subtitle') }}</p>
      </div><!-- End Section Title -->

      <div class="container">
        @include('partials.pricing-packages')
      </div>

    </section><!-- /Pricing Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>{{ __('messages.testimonials_title') }}</h2>
        <p>{{ __('messages.testimonials_subtitle') }}</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        @if($testimonials && $testimonials->count() > 0)
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
              @foreach($testimonials as $testimonial)
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    @if($testimonial->image)
                      <img src="{{ asset($testimonial->image) }}" class="testimonial-img" alt="{{ $testimonial->name }}">
                    @endif
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
            </div>
            <div class="swiper-pagination"></div>
          </div>
        @else
          <div class="text-center text-muted mb-5">
            <p class="mb-0">{{ __('messages.testimonials_no_testimonials') }}</p>
          </div>
        @endif

        <div class="testimonial-submit mt-5">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="text-center mb-4">
                <button class="btn-submit-testimonial" type="button" data-bs-toggle="collapse" data-bs-target="#testimonialForm" aria-expanded="{{ $errors->any() || session('testimonial_success') ? 'true' : 'false' }}" aria-controls="testimonialForm">
                  {{ __('messages.testimonials_add_yours') }}
                </button>
              </div>

              @if(session('testimonial_success'))
                <div class="alert alert-success" role="alert">
                  {{ session('testimonial_success') }}
                </div>
              @endif

              <div class="collapse {{ $errors->any() || session('testimonial_success') ? 'show' : '' }}" id="testimonialForm">
                <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data" class="testimonial-form">
                  @csrf
                  <div class="row gy-3">
                    <div class="col-md-6">
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="{{ __('messages.testimonials_form_name') }}" required>
                      @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="{{ __('messages.testimonials_form_email') }}" required>
                      @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}" placeholder="{{ __('messages.testimonials_form_position') }}">
                      @error('position')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" value="{{ old('company') }}" placeholder="{{ __('messages.testimonials_form_company') }}">
                      @error('company')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <select name="rating" class="form-select @error('rating') is-invalid @enderror" required>
                        <option value="">{{ __('messages.testimonials_form_rating') }}</option>
                        @for($i = 5; $i >= 1; $i--)
                          <option value="{{ $i }}" @selected(old('rating') == $i)>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                        @endfor
                      </select>
                      @error('rating')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-md-6">
                      <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/jpeg,image/png,image/webp">
                      @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-12">
                      <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="4" placeholder="{{ __('messages.testimonials_form_message') }}" required>{{ old('content') }}</textarea>
                      @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-12 text-center mt-3">
                      <button type="submit" class="btn btn-primary">{{ __('messages.testimonials_form_submit') }}</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->


    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>{{ __('messages.contact_title') }}</h2>
        <p>{{ __('messages.contact_subtitle') }}</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>{{ __('messages.contact_address') }}</h3>
                  <p>{{ \App\Models\SiteSetting::get('contact_address', 'Sour, Lebanon') }}</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>{{ __('messages.contact_call') }}</h3>
                  <p>{{ \App\Models\SiteSetting::get('contact_phone', '78768725') }}</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-whatsapp flex-shrink-0"></i>
                <div>
                  <h3>{{ __('messages.contact_whatsapp_label') }}</h3>
                  <p>{{ \App\Models\SiteSetting::get('contact_whatsapp', 'Available') }}</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                <i class="bi bi-clock flex-shrink-0"></i>
                <div>
                  <h3>{{ __('messages.contact_hours') }}</h3>
                  <p>{{ \App\Models\SiteSetting::get('contact_working_hours', 'Monday - Sunday, 9:00 AM - 5:00 PM') }}</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="600">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>{{ __('messages.contact_email_label') }}</h3>
                  <p>{{ \App\Models\SiteSetting::get('contact_email', config('mail.from.address')) }}</p>
                </div>
              </div><!-- End Info Item -->

            </div>
          </div>

          <div class="col-lg-7">
            <form action="{{ route('contact.store') }}" method="post" data-aos="fade-up" data-aos-delay="200">
              @csrf
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="{{ __('messages.contact_name') }}" required="">
                  @error('name')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-6 ">
                  <input type="email" name="email" class="form-control" placeholder="{{ __('messages.contact_email') }}" required="">
                  @error('email')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-12">
                  <input type="text" name="subject" class="form-control" placeholder="{{ __('messages.contact_subject') }}">
                  @error('subject')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="5" placeholder="{{ __('messages.contact_message') }}" required=""></textarea>
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

    </section><!-- /Contact Section -->

  @endsection
