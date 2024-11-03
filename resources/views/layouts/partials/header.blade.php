<!-- resources/views/layouts/partials/header.blade.php -->
<style>
    /* Slider Image Height */
    .custom-slider .carousel-item img {
        height: 400px; /* Set a comfortable height for slider */
        object-fit: cover; /* Ensures the image fills the area without distortion */
        width: 100%; /* Full width */
    }
</style>
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
        <a href="{{url('/')}}" class="logo d-flex align-items-center me-auto me-xl-0">
            @if ($siteSetting && $siteSetting->logo)
                <img src="{{ asset('storage/' . $siteSetting->logo) }}" alt="Barangay Logo" style="max-height: 50px;">
            @else
                <img src="https://via.placeholder.com/50x50.png?text=Logo" alt="Barangay Logo">
            @endif
            <h1 class="sitename">BARANGAY</h1>CENTRO 2
        </a>
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li class="dropdown"><a href="#"><span>Visitors</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                      <li><a href="#">Banks</a></li>
                      <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                          <li><a href="#">Deep Dropdown 1</a></li>
                          <li><a href="#">Deep Dropdown 2</a></li>
                          <li><a href="#">Deep Dropdown 3</a></li>
                          <li><a href="#">Deep Dropdown 4</a></li>
                          <li><a href="#">Deep Dropdown 5</a></li>
                        </ul>
                      </li>
                      <li><a href="#">Dropdown 2</a></li>
                      <li><a href="#">Dropdown 3</a></li>
                      <li><a href="#">Dropdown 4</a></li>
                    </ul>
                  </li>
                <li><a href="#team">Barangay Officials</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        <a class="btn-getstarted" href="{{ auth()->check() ? route('filament.admin.pages.dashboard') : route('filament.admin.auth.login') }}">
            {{ auth()->check() ? 'Dashboard' : 'Login' }}
        </a>
    </div>
</header>
