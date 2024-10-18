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
    <title>{{ $siteSetting ? $siteSetting->name : 'Barangay Landing Page' }}</title>

    <!-- Favicons -->
    <link href="{{ asset('template/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('template/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('template/css/main.css') }}" rel="stylesheet">

    <style>
        /* Custom CSS for smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
        /* Optional: Add spacing between navbar items */
.navbar-nav .nav-item {
    margin-left:40px;
}

/* Adjust logo size on smaller screens */
@media (max-width: 768px) {
    .logo img {
        max-height: 40px; /* Adjust the logo size for mobile */
    }
}
    </style>
</head>
<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="70" tabindex="0">

 <!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            @if ($siteSetting && $siteSetting->logo)
                <img src="{{ asset('storage/' . $siteSetting->logo) }}" alt="Barangay Logo" style="max-height: 50px;">
            @else
                <img src="https://via.placeholder.com/50x50.png?text=Logo" alt="Barangay Logo"> <!-- Fallback logo -->
            @endif
        </a>

        <!-- Navbar with flex utility classes -->
        <nav id="navbar" class="navbar">
            <ul class="d-flex align-items-center ms-auto">
                <li><a class="nav-link scrollto active" href="#home">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                <li><a class="nav-link scrollto" href="#citizens-charter">Citizens Charter</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <!-- Authentication Links -->
        @if (Route::has('filament.admin.auth.login'))
            <div class="d-flex align-items-center ms-3">
                @auth
                    <a href="{{ route('filament.admin.pages.dashboard') }}" class="btn btn-primary">Dashboard</a>
                @else
                    <a href="{{ route('filament.admin.auth.login') }}" class="btn btn-secondary ms-2">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-secondary ms-2">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="home" class="hero d-flex align-items-center">
        <div class="container">
            <h1>Welcome to {{ $siteSetting ? $siteSetting->name : 'Our Barangay' }}</h1>
            <h2>We are a community-driven organization focused on improving the lives of our constituents.</h2>
            <a href="#about" class="btn-get-started scrollto">Learn More</a>
        </div>
    </section><!-- End Hero -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            <h2>About Us</h2>
            <p>This section gives an overview of the barangay.</p>
            <img src="https://via.placeholder.com/400x300.png?text=Cartoon+Image+2" alt="About Image" class="mt-3 img-fluid">
        </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">
            <h2>Our Services</h2>
            <ul class="list-group">
                <li class="list-group-item">Service 1: Community Clean-up</li>
                <li class="list-group-item">Service 2: Health and Wellness Programs</li>
                <li class="list-group-item">Service 3: Security and Safety Patrols</li>
                <li class="list-group-item">Service 4: Educational Workshops</li>
                <li class="list-group-item">Service 5: Disaster Preparedness Training</li>
            </ul>
        </div>
    </section><!-- End Services Section -->

    <!-- ======= Citizens Charter Section ======= -->
    <section id="citizens-charter" class="pt-5 mt-5">
        <div class="container">
            <h2>Citizens Charter</h2>
            <p>Pursuant to Section 6 of R.A 9485</p>
            <p><strong>Vision:</strong> An exemplary barangay with unified, disciplined, and God-loving constituents working towards prosperity.</p>
            <p><strong>Mission:</strong> To provide satisfactory services through democratic leadership that enables the people to become politically responsible, morally upright, and economically capable.</p>

            <!-- Citizens Charter Table -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Frontline Services</th>
                            <th>Step / Procedures</th>
                            <th>Responsible Person</th>
                            <th>Maximum Response Time</th>
                            <th>Requirements</th>
                            <th>Amount of Fees</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample Row -->
                        <tr>
                            <td>Issuance of Clearances and Certificate (CTC)</td>
                            <td>1. Fill-up Request Slip<br>2. Process the request</td>
                            <td>Barangay Secretary</td>
                            <td>5 minutes</td>
                            <td>Valid ID</td>
                            <td>₱100.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section><!-- End Citizens Charter Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="pt-5 mt-5 contact">
        <div class="container">
            <h2>Contact Us</h2>
            <p>If you have any questions or need further information, please don't hesitate to contact us.</p>
            <p><strong>Email:</strong> info@barangayname.com</p>
            <p><strong>Phone:</strong> (123) 456-7890</p>
            <p><strong>Address:</strong> 123 Barangay Street, City, Country</p>
            <img src="https://via.placeholder.com/400x300.png?text=Contact+Image" alt="Contact Image" class="mt-3 img-fluid">
        </div>
    </section><!-- End Contact Section -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="copyright">
                &copy; {{ date('Y') }} <strong><span>{{ $siteSetting ? $siteSetting->name : 'Barangay Name' }}</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <!-- Vendor JS Files -->
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('template/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('template/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('template/js/main.js') }}"></script>

</body>
</html>
