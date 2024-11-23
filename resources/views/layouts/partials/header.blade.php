<!-- resources/views/layouts/partials/header.blade.php -->
<head>
    <!-- Glightbox CSS -->
    <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">

    <style>
        /* Slider Image Height */
        .custom-slider .carousel-item img {
            height: 400px; /* Set a comfortable height for slider */
            object-fit: cover; /* Ensures the image fills the area without distortion */
            width: 100%; /* Full width */
        }

        #citizens-charter {
            display: block;
            visibility: visible;
        }

        .charter-table table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>
</head>

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
                <li><a href="{{ url('/#hero') }}">Home</a></li>
                <li><a href="{{ url('/#about') }}">About</a></li>
                <li><a href="{{ url('/#services') }}">Services</a></li>
                <li><a href="{{ url('/#events') }}">Barangay Events</a></li>
                <li><a href="{{ url('/#portfolio') }}">Sk Programs</a></li>
                <li><a href="{{ url('/#portfolio') }}">Agkaykaysa Programs</a></li>
                <li><a href="{{ url('visitors-lounge') }}">Visitor's Lounge</a></li>
                <li><a href="{{ url('/#team') }}">Barangay officials</a></li>
                <li><a href="{{ url('/#team') }}">Barangay Health Worker</a></li>
            </ul>
            
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        <a class="btn-getstarted" href="{{ auth()->check() ? route('filament.admin.pages.dashboard') : route('filament.admin.auth.login') }}">
            {{ auth()->check() ? 'Dashboard' : 'Login' }}
        </a>
    </div>
</header>

<!-- Glightbox JS -->
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const lightbox = GLightbox({
            selector: '.glightbox', // Use the class from the anchor tags
            touchNavigation: true,
            loop: true,
            zoomable: true,
            closeButton: true, // Show close button
        });
    });
</script>
