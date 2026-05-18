<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard - Krecht Solutions</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/logo/logo-solution.png') }}">
  <!-- Google Fonts: Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
  <!-- Tabler Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
  <!-- Admin custom CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">

</head>

<body>
  <div id="overlay" class="overlay"></div>
  <!-- TOPBAR -->
  <nav id="topbar" class="navbar bg-white border-bottom fixed-top topbar px-3">
    <button id="toggleBtn" class="d-none d-lg-inline-flex btn btn-light btn-icon btn-sm ">
      <i class="ti ti-layout-sidebar-left-expand"></i>
    </button>

    <!-- MOBILE -->
    <button id="mobileBtn" class="btn btn-light btn-icon btn-sm d-lg-none me-2">
      <i class="ti ti-layout-sidebar-left-expand"></i>
    </button>
    <div>
      <!-- Navbar nav -->
      <ul class="list-unstyled d-flex align-items-center mb-0 gap-1">
        <!-- Pages link -->

        <!-- Bell icon -->
        <li>
          <a class="position-relative btn-icon btn-sm btn-light btn rounded-circle" data-bs-toggle="dropdown"
            aria-expanded="false" href="#" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
              class="icon icon-tabler icons-tabler-outline icon-tabler-bell">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
              <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
            </svg>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-2 ms-n2">
              2
              <span class="visually-hidden">unread messages</span>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-md p-0">
            <ul class="list-unstyled p-0 m-0">
              <li class="p-3 border-bottom ">
                <div class="d-flex gap-3">
                  <img src="{{ asset('assets/admin/images/avatar/avatar-1.jpg') }}" alt="" class="avatar avatar-sm rounded-circle" />
                  <div class="flex-grow-1 small">
                    <p class="mb-0">New order received</p>
                    <p class="mb-1">Order #12345 has been placed</p>
                    <div class="text-secondary">5 minutes ago</div>
                  </div>
                </div>
              </li>
              <li class="p-3 border-bottom ">
                <div class="d-flex gap-3">
                  <img src="{{ asset('assets/admin/images/avatar/avatar-4.jpg') }}" alt="" class="avatar avatar-sm rounded-circle" />
                  <div class="flex-grow-1 small">
                    <p class="mb-0">New user registered</p>
                    <p class="mb-1">User @john_doe has signed up</p>
                    <div class="text-secondary">30 minutes ago</div>
                  </div>
                </div>
              </li>

              <li class="p-3 border-bottom">
                <div class="d-flex gap-3">
                  <img src="{{ asset('assets/admin/images/avatar/avatar-2.jpg') }}" alt="" class="avatar avatar-sm rounded-circle" />
                  <div class="flex-grow-1 small">
                    <p class="mb-0">Payment confirmed</p>
                    <p class="mb-1">Payment of $299 has been received</p>
                    <div class="text-secondary">1 hour ago</div>
                  </div>
                </div>
              </li>
              <li class="px-4 py-3 text-center">
                <a href="#" class="text-primary ">View all notifications</a>
              </li>
            </ul>
          </div>
        </li>
        <!-- Dropdown -->
        <li class="ms-3 dropdown">
          <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('assets/admin/images/avatar/avatar-1.jpg') }}" alt="" class="avatar avatar-sm rounded-circle" />
          </a>
          <div class="dropdown-menu dropdown-menu-end p-0" style="min-width: 200px;">
            <div>
              <div class="d-flex gap-3 align-items-center border-dashed border-bottom px-3 py-3">
                <img src="{{ asset('assets/admin/images/avatar/avatar-1.jpg') }}" alt="" class="avatar avatar-md rounded-circle" />
                <div>
                  <h4 class="mb-0 small">{{ auth()->check() ? auth()->user()->name : 'Admin User' }}</h4>
                  <p class="mb-0  small">@{{ auth()->check() ? auth()->user()->email : 'admin' }}</p>
                </div>
              </div>
              <div class="p-3 d-flex flex-column gap-1 small lh-lg">
                <a href="{{ route('home') }}" class="">

                  <span>Home</span>
                </a>
                <a href="{{ route('admin.contact-messages.index') }}" class="">

                  <span> Inbox</span>
                </a>
                <a href="#" class="">

                  <span> Chat</span>
                </a>
                <a href="#" class="">

                  <span> Activity</span>
                </a>
                @if(auth()->check())
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link text-decoration-none p-0 text-start w-100">
                        <span>Logout</span>
                    </button>
                </form>
                @endif
              </div>

            </div>
          </div>
        </li>
      </ul>
    </div>

  </nav>

  <!-- SIDEBAR -->
  <aside id="sidebar" class="sidebar">
    <div class="logo-area">
      <a href="{{ route('admin.dashboard') }}" class="d-inline-flex align-items-center">
        <img src="{{ asset('assets/img/logo/logo-solution.png') }}" alt="Krecht Solutions" style="max-height: 50px; width: auto; max-width: 200px;">
      </a>
    </div>
    <ul class="nav flex-column">
      <li class="px-4 py-2"><small class="nav-text">Main</small></li>
      <li><a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i><span
            class="nav-text">Dashboard</span></a></li>
      <li><a class="nav-link {{ request()->routeIs('admin.services.index') ? 'active' : '' }}" href="{{ route('admin.services.index') }}"><i class="ti ti-box-seam"></i><span
            class="nav-text">Services</span></a></li>
      <li><a class="nav-link {{ request()->routeIs('admin.projects.index') ? 'active' : '' }}" href="{{ route('admin.projects.index') }}"><i class="ti ti-plus"></i><span class="nav-text">Projects</span></a></li>
    <li><a class="nav-link {{ request()->routeIs('admin.pricing-packages.index') ? 'active' : '' }}" href="{{ route('admin.pricing-packages.index') }}"><i class="ti ti-receipt"></i><span class="nav-text">Pricing</span></a>
      </li>
    <li><a class="nav-link {{ request()->routeIs('admin.testimonials.index') ? 'active' : '' }}" href="{{ route('admin.testimonials.index') }}"><i class="ti ti-alert-circle"></i><span class="nav-text">Testimonials</span></a>
      </li>
      <li><a class="nav-link {{ request()->routeIs('admin.faqs.index') ? 'active' : '' }}" href="{{ route('admin.faqs.index') }}"><i class="ti ti-file-text"></i><span class="nav-text">FAQs</span></a></li>
      <li><a class="nav-link {{ request()->routeIs('admin.contact-messages.index') ? 'active' : '' }}" href="{{ route('admin.contact-messages.index') }}"><i class="ti ti-message"></i><span class="nav-text">Messages</span></a></li>
      <li><a class="nav-link {{ request()->routeIs('admin.settings.index') ? 'active' : '' }}" href="{{ route('admin.settings.index') }}"><i class="ti ti-settings"></i><span class="nav-text">Settings</span></a></li>


      <li class="px-4 pt-4 pb-2"><small class="nav-text">Account</small></li>
      @if(auth()->check())
      <li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="nav-link w-100 text-start border-0 bg-transparent">
                <i class="ti ti-logout"></i><span class="nav-text">Logout</span>
            </button>
        </form>
      </li>
      @else
      <li><a class="nav-link" href="{{ route('admin.login') }}"><i class="ti ti-logout"></i><span class="nav-text">Log in</span></a>
      </li>
      @endif
    </ul>

  </aside>
  <main id="content" class="content py-10">
        @yield('content')
    </main>
    <!-- Bootstrap JS -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Admin Sidebar JS -->
  <script src="{{ asset('assets/admin/js/sidebar.js') }}"></script>


  </body>

</html>