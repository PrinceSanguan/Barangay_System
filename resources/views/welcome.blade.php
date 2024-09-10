@php
    // Fetch the first site setting
    $siteSetting = \App\Models\SiteSetting::first();
@endphp
<!-- resources/views/barangay.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Landing Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
        /* Navbar logo */
        .navbar-brand img {
            max-height: 50px; /* Adjust the size of the logo */
        }
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbarNav" data-bs-offset="70" tabindex="0">

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                @if ($siteSetting && $siteSetting->logo)
                    <img src="{{ asset('storage/' . $siteSetting->logo) }}" alt="Barangay Logo" style="max-height: 50px;">
                @else
                    <img src="https://via.placeholder.com/50x50.png?text=Logo" alt="Barangay Logo"> <!-- Fallback logo -->
                @endif
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
    

         <!-- Authentication Links -->
         @if (Route::has('filament.admin.auth.login'))
         <nav class="d-flex flex-1 justify-content-end">
             @auth
                 <a href="{{ route('filament.admin.pages.dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                     Dashboard
                 </a>
             @else
                 <a href="{{ route('filament.admin.auth.login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                     Log in
                 </a>
                 @if (Route::has('register'))
                     <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                         Register
                     </a>
                 @endif
             @endauth
         </nav>
     @endif
 </div>
</div>
</nav>

  
    <!-- Image Slider (Carousel) -->
<div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @if ($siteSetting && is_array($siteSetting->slider_images))
            @foreach ($siteSetting->slider_images as $index => $slider_image)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $slider_image) }}" class="d-block w-100" alt="Slide {{ $index + 1 }}">
                </div>
            @endforeach
        @else
            <p>No slider images available.</p>
        @endif
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#imageSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#imageSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

    <!-- Home Section -->
    <section id="home" class="pt-5 mt-5">
        <div class="container">
            <h1>Welcome to the Barangay Website</h1>
            <p>This is the home section of the website.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <img src="https://via.placeholder.com/400x300.png?text=Cartoon+Image+1" alt="Cartoon Image 1" class="img-fluid mt-3">
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="pt-5 mt-5">
        <div class="container">
            <h2>About Us</h2>
            <p>This is the about section content. It gives an overview of the barangay.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nec nisl odio. Mauris vehicula at nunc id posuere. Praesent non nulla eget mi dictum interdum. Fusce pretium, nisi vel dapibus consequat, nisl odio feugiat turpis, ut facilisis quam velit eu est. Cras in dolor tellus. Nullam vestibulum ante a sapien euismod, vel accumsan ex commodo. Curabitur pharetra tincidunt libero, sit amet fermentum lacus hendrerit in.</p>
            <p>Vivamus viverra dolor non massa elementum, ac vehicula ex aliquet. Integer eget dui vitae orci sagittis fermentum non vel ante. Etiam in nulla in justo tincidunt convallis a id elit.</p>
            <img src="https://via.placeholder.com/400x300.png?text=Cartoon+Image+2" alt="Cartoon Image 2" class="img-fluid mt-3">
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="pt-5 mt-5">
        <div class="container">
            <h2>Our Services</h2>
            <p>This section describes the services provided by the barangay.</p>
            <ul class="list-group">
                <li class="list-group-item">Service 1: Community Clean-up</li>
                <li class="list-group-item">Service 2: Health and Wellness Programs</li>
                <li class="list-group-item">Service 3: Security and Safety Patrols</li>
                <li class="list-group-item">Service 4: Educational Workshops</li>
                <li class="list-group-item">Service 5: Disaster Preparedness Training</li>
            </ul>
            <p>These services are designed to improve the quality of life for residents and foster a strong sense of community.</p>
            <img src="https://via.placeholder.com/400x300.png?text=Cartoon+Image+3" alt="Cartoon Image 3"  class="img-fluid mt-3">
        </div>
    </section>
    <div class="container">
        <h1>Upcoming Events</h1>
        @if ($events->count())
            <div class="row">
                @foreach ($events as $event)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->title }}</h5>
                                <p class="card-text">{{ $event->description }}</p>
                                <p><strong>Location:</strong> {{ $event->location }}</p>
                                <p><strong>Date:</strong> {{ $event->event_date->format('F j, Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No events are currently available.</p>
        @endif
    </div>
    <!-- Contact Section -->
    <section id="contact" class="pt-5 mt-5">
        <div class="container">
            <h2>Contact Us</h2>
            <p>This section provides contact information.</p>
            <p>If you have any questions or need further information, please don't hesitate to contact us.</p>
            <p><strong>Email:</strong> info@barangayname.com</p>
            <p><strong>Phone:</strong> (123) 456-7890</p>
            <p><strong>Address:</strong> 123 Barangay Street, City, Country</p>
            <img src="https://via.placeholder.com/400x300.png?text=Cartoon+Image+4" alt="Cartoon Image 4" class="img-fluid mt-3">
        </div>
    </section>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>