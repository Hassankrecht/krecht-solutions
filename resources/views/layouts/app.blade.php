<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', \App\Models\SiteSetting::get('site_name', 'Krecht Solutions'))</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logo/logo-solution.png') }}" rel="icon" type="image/png">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  @if(app()->getLocale() === 'ar')
  <style>
    [dir="rtl"] .navmenu ul {
      padding-right: 0;
    }
    [dir="rtl"] .navmenu ul li {
      margin-left: 10px;
      margin-right: 0;
    }
    [dir="rtl"] .btn-getstarted {
      margin-right: auto;
      margin-left: 0;
    }
    [dir="rtl"] .footer-links ul {
      padding-right: 0;
    }
    [dir="rtl"] .footer-links ul li {
      padding-right: 0;
    }
  </style>
  @endif
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  @stack('styles')
</head>

<body class="@yield('body_class', 'inner-page')">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
        <img src="{{ asset('assets/img/logo/logo-solution.png') }}" alt="{{ \App\Models\SiteSetting::get('site_name', 'Krecht Solutions') }}">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">{{ __('messages.nav_home') }}</a></li>
          <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">{{ __('messages.nav_about') }}</a></li>
          <li><a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">{{ __('messages.nav_services') }}</a></li>
          <li><a href="{{ route('pricing') }}" class="{{ request()->routeIs('pricing') ? 'active' : '' }}">{{ __('messages.nav_pricing') }}</a></li>
          <li><a href="{{ route('portfolio') }}" class="{{ request()->routeIs('portfolio') ? 'active' : '' }}">{{ __('messages.nav_portfolio') }}</a></li>
          <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">{{ __('messages.nav_contact') }}</a></li>
          <li class="dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-globe"></i>
            </a>
            <ul class="dropdown-menu">
              <li>
                <form method="POST" action="{{ route('language.switch') }}">
                  @csrf
                  <input type="hidden" name="locale" value="en">
                  <button type="submit" class="dropdown-item {{ app()->getLocale() === 'en' ? 'active' : '' }}">
                {{ __('messages.lang_english') }}
                  </button>
                </form>
              </li>
              <li>
                <form method="POST" action="{{ route('language.switch') }}">
                  @csrf
                  <input type="hidden" name="locale" value="ar">
                  <button type="submit" class="dropdown-item {{ app()->getLocale() === 'ar' ? 'active' : '' }}">
                {{ __('messages.lang_arabic') }}
                  </button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ route('contact') }}">{{ __('messages.nav_get_started') }}</a>

    </div>
  </header>

  <main class="main">
    @yield('content')
  </main>

  <footer id="footer" class="footer dark-background">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/img/logo/logo-solution.png') }}" alt="{{ \App\Models\SiteSetting::get('site_name', 'Krecht Solutions') }}" style="max-height: 80px; height: auto; width: auto; filter: brightness(0) invert(1);">
          </a>
          <p class="mt-3">{{ __('messages.footer_about') }}</p>
          <div class="social-links d-flex mt-4">
            @php $socialLinks = \App\Models\SiteSetting::get('social_links', []); @endphp
            @if(!empty($socialLinks['twitter']))<a href="{{ $socialLinks['twitter'] }}" target="_blank"><i class="bi bi-twitter-x"></i></a>@else<a href="#"><i class="bi bi-twitter-x"></i></a>@endif
            @if(!empty($socialLinks['facebook']))<a href="{{ $socialLinks['facebook'] }}" target="_blank"><i class="bi bi-facebook"></i></a>@else<a href="#"><i class="bi bi-facebook"></i></a>@endif
            @if(!empty($socialLinks['instagram']))<a href="{{ $socialLinks['instagram'] }}" target="_blank"><i class="bi bi-instagram"></i></a>@else<a href="#"><i class="bi bi-instagram"></i></a>@endif
            @if(!empty($socialLinks['linkedin']))<a href="{{ $socialLinks['linkedin'] }}" target="_blank"><i class="bi bi-linkedin"></i></a>@else<a href="#"><i class="bi bi-linkedin"></i></a>@endif
          </div>
        </div>
        <div class="col-lg-2 col-6 footer-links">
          <h4>{{ __('messages.footer_quick_links') }}</h4>
          <ul>
            <li><a href="{{ route('home') }}">{{ __('messages.footer_home') }}</a></li>
            <li><a href="{{ route('about') }}">{{ __('messages.footer_about_us') }}</a></li>
            <li><a href="{{ route('services') }}">{{ __('messages.footer_services') }}</a></li>
            <li><a href="{{ route('portfolio') }}">{{ __('messages.footer_portfolio') }}</a></li>
            <li><a href="{{ route('contact') }}">{{ __('messages.footer_contact') }}</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-6 footer-links">
          <h4>{{ __('messages.footer_our_services') }}</h4>
          <ul>
            <li><a href="{{ route('services') }}">{{ __('messages.footer_service_laravel') }}</a></li>
            <li><a href="{{ route('services') }}">{{ __('messages.footer_service_flutter') }}</a></li>
            <li><a href="{{ route('services') }}">{{ __('messages.footer_service_api') }}</a></li>
            <li><a href="{{ route('services') }}">{{ __('messages.footer_service_pos') }}</a></li>
            <li><a href="{{ route('services') }}">{{ __('messages.footer_service_business') }}</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>{{ __('messages.footer_contact_us') }}</h4>
          <p>{{ \App\Models\SiteSetting::get('contact_address', 'Sour, Lebanon') }}</p>
          <p class="mt-3"><strong>{{ __('messages.footer_phone') }}</strong> <span>{{ \App\Models\SiteSetting::get('contact_phone', '78768725') }}</span></p>
          <p><strong>{{ __('messages.footer_whatsapp') }}</strong> <span>{{ \App\Models\SiteSetting::get('contact_whatsapp', 'Available') }}</span></p>
          <p><strong>{{ __('messages.footer_hours') }}</strong> <span>{{ \App\Models\SiteSetting::get('footer_working_hours', 'Mon - Sun | 9 AM - 5 PM') }}</span></p>
          <p><strong>{{ __('messages.footer_email') }}</strong> <span>{{ \App\Models\SiteSetting::get('contact_email', config('mail.from.address')) }}</span></p>
        </div>
      </div>
    </div>
    <div class="container copyright text-center mt-4">
      <p>© 2026 <strong class="px-1 sitename">{{ \App\Models\SiteSetting::get('site_name', 'Krecht Solutions') }}</strong>. {{ __('messages.footer_copyright') }}</p>
      <div class="credits">{{ __('messages.footer_credits') }}</div>
    </div>
  </footer>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  @stack('scripts')

  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/6a0b6b8ff155db1c33ef7828/1jou9oc34';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End of Tawk.to Script-->

</body>

</html>
