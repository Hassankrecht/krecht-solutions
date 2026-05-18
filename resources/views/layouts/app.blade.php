<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title', 'Krecht Solutions')</title>
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
        <img src="{{ asset('assets/img/logo/logo-solution.png') }}" alt="Krecht Solutions">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
          <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
          <li><a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? 'active' : '' }}">Services</a></li>
          <li><a href="{{ route('pricing') }}" class="{{ request()->routeIs('pricing') ? 'active' : '' }}">Pricing</a></li>
          <li><a href="{{ route('portfolio') }}" class="{{ request()->routeIs('portfolio') ? 'active' : '' }}">Portfolio</a></li>
          <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ route('contact') }}">Get Started</a>

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
            <img src="{{ asset('assets/img/logo/logo-solution.png') }}" alt="Krecht Solutions" style="max-height: 80px; height: auto; width: auto; filter: brightness(0) invert(1);">
          </a>
          <p class="mt-3">Krecht Solutions builds modern software, mobile applications, dashboards, and business systems designed to help companies grow efficiently.</p>
          <div class="social-links d-flex mt-4">
            <a href="#"><i class="bi bi-twitter-x"></i></a>
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-6 footer-links">
          <h4>Quick Links</h4>
          <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="{{ route('services') }}">Services</a></li>
            <li><a href="{{ route('portfolio') }}">Portfolio</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="{{ route('services') }}">Laravel Dashboards</a></li>
            <li><a href="{{ route('services') }}">Flutter Mobile Apps</a></li>
            <li><a href="{{ route('services') }}">API Integration</a></li>
            <li><a href="{{ route('services') }}">POS Systems</a></li>
            <li><a href="{{ route('services') }}">Business Systems</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>{{ \App\Models\SiteSetting::get('contact_address', 'Sour, Lebanon') }}</p>
          <p class="mt-3"><strong>Phone:</strong> <span>{{ \App\Models\SiteSetting::get('contact_phone', '78768725') }}</span></p>
          <p><strong>WhatsApp:</strong> <span>{{ \App\Models\SiteSetting::get('contact_whatsapp', 'Available') }}</span></p>
          <p><strong>Hours:</strong> <span>{{ \App\Models\SiteSetting::get('footer_working_hours', 'Mon - Sun | 9 AM - 5 PM') }}</span></p>
          <p><strong>Email:</strong> <span>{{ \App\Models\SiteSetting::get('contact_email', config('mail.from.address')) }}</span></p>
        </div>
      </div>
    </div>
    <div class="container copyright text-center mt-4">
      <p>© 2026 <strong class="px-1 sitename">Krecht Solutions</strong>. All Rights Reserved.</p>
      <div class="credits">Built with Laravel &amp; Flutter</div>
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
