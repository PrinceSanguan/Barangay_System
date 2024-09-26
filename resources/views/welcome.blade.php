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
                        <a class="nav-link" href="#citizens-charter">Citizens Charter</a>
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
   <!-- Add this section where you want the demographic statistics to appear -->
<section id="demographics" class="pt-5 mt-5">
    <div class="container">
        <h2>Demographic Statistics</h2>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card p-3">
                    <h3>Total Population</h3>
                    <p>{{ $totalPopulation }}</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3">
                    <h3>Male Count</h3>
                    <p>{{ $maleCount }}</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3">
                    <h3>Female Count</h3>
                    <p>{{ $femaleCount }}</p>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card p-3">
                    <h3>Population by Age Groups</h3>
                    <ul>
                        @foreach ($ageGroups as $ageRange => $count)
                            <li>{{ $ageRange }}: {{ $count }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
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

    <!-- Mission and Vision Section -->
    <section id="mission-vision" class="pt-5 mt-5">
        <div class="container">
            <h2>Our Mission & Vision</h2>
            <p><strong>Mission:</strong> To provide satisfactory services through democratic leadership that enables the people to become politically responsible, morally upright, and economically capable.</p>
            <p><strong>Vision:</strong> An exemplary barangay with unified, disciplined, and God-loving constituents working together towards prosperity.</p>
        </div>
    </section>
      <!-- History of the Barangay Section -->
      <section id="history" class="pt-5 mt-5">
        <div class="container">
            <h2>History of the Barangay</h2>
            <p>The history of our barangay dates back to the early 1900s. It was originally a small farming community that gradually evolved into a vibrant hub of culture and commerce. Our ancestors worked hard to establish the barangay as a place of unity, progress, and shared values.</p>
            <p>Through the years, the barangay has overcome various challenges, including natural disasters, economic hardships, and social changes. Despite these obstacles, our community has remained resilient, maintaining its core values of unity, hard work, and mutual respect.</p>
            <p>Today, our barangay continues to thrive, blending modern progress with our rich cultural heritage. We honor our past by remembering the efforts and sacrifices of those who came before us, and we strive to build a brighter future for the generations to come.</p>
        </div>
    </section>
    <!-- Visitors' Launch Section -->
<section id="visitors-launch" class="pt-5 mt-5">
    <div class="container">
        <h2>Visitors' Launch</h2>
        <p>Explore the tourist spots, restaurants, hotels, parks, schools, hospitals, and churches in our barangay.</p>

        <!-- Tourist Spots -->
        <h3 class="mt-4">Tourist Spots</h3>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300.png?text=Tourist+Spot+1" class="card-img-top" alt="Tourist Spot 1">
                    <div class="card-body">
                        <h5 class="card-title">Mountain View Park</h5>
                        <p class="card-text">A beautiful spot with stunning mountain views and hiking trails.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300.png?text=Tourist+Spot+2" class="card-img-top" alt="Tourist Spot 2">
                    <div class="card-body">
                        <h5 class="card-title">Heritage Museum</h5>
                        <p class="card-text">Learn about the history and culture of our barangay at this museum.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Restaurants -->
        <h3 class="mt-4">Restaurants</h3>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300.png?text=Restaurant+1" class="card-img-top" alt="Restaurant 1">
                    <div class="card-body">
                        <h5 class="card-title">Bistro Delights</h5>
                        <p class="card-text">A cozy restaurant offering a variety of local and international dishes.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300.png?text=Restaurant+2" class="card-img-top" alt="Restaurant 2">
                    <div class="card-body">
                        <h5 class="card-title">Seaside Grill</h5>
                        <p class="card-text">Enjoy fresh seafood with a stunning view of the sea.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hotels -->
        <h3 class="mt-4">Hotels</h3>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300.png?text=Hotel+1" class="card-img-top" alt="Hotel 1">
                    <div class="card-body">
                        <h5 class="card-title">Grand Plaza Hotel</h5>
                        <p class="card-text">Luxury accommodation with top-notch amenities and services.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300.png?text=Hotel+2" class="card-img-top" alt="Hotel 2">
                    <div class="card-body">
                        <h5 class="card-title">Comfort Inn</h5>
                        <p class="card-text">Affordable lodging with comfortable rooms and friendly staff.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Parks -->
        <h3 class="mt-4">Parks</h3>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300.png?text=Park+1" class="card-img-top" alt="Park 1">
                    <div class="card-body">
                        <h5 class="card-title">Sunset Park</h5>
                        <p class="card-text">A peaceful park perfect for evening strolls and picnics.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Schools -->
        <h3 class="mt-4">Schools</h3>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300.png?text=School+1" class="card-img-top" alt="School 1">
                    <div class="card-body">
                        <h5 class="card-title">Barangay National High School</h5>
                        <p class="card-text">A public high school offering quality education for students.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hospitals -->
        <h3 class="mt-4">Hospitals</h3>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300.png?text=Hospital+1" class="card-img-top" alt="Hospital 1">
                    <div class="card-body">
                        <h5 class="card-title">Barangay General Hospital</h5>
                        <p class="card-text">Providing comprehensive healthcare services to the community.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Churches -->
        <h3 class="mt-4">Churches</h3>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300.png?text=Church+1" class="card-img-top" alt="Church 1">
                    <div class="card-body">
                        <h5 class="card-title">St. Mary's Church</h5>
                        <p class="card-text">A historic church known for its beautiful architecture and serene environment.</p>
                    </div>
                </div>
            </div>
        </div>
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
    <!-- Promotional Advertisement Announcement Section -->
<section id="promotional-announcement" class="pt-5 mt-5">
    <div class="container">
        <h2>Promotional Advertisement Announcement</h2>
        <p>Stay updated with the latest promotional advertisements and announcements in our barangay. From community events to local business promotions, find out what's happening around you!</p>
        
        <!-- Sample Promotional Advertisements -->
        <div class="row">
            <!-- Advertisement 1 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300.png?text=Ad+1" class="card-img-top" alt="Ad 1">
                    <div class="card-body">
                        <h5 class="card-title">Local Business Fair</h5>
                        <p class="card-text">Join us for a local business fair showcasing products from various businesses in our barangay. Don't miss the special discounts and promos!</p>
                    </div>
                </div>
            </div>

            <!-- Advertisement 2 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300.png?text=Ad+2" class="card-img-top" alt="Ad 2">
                    <div class="card-body">
                        <h5 class="card-title">Community Sports Fest</h5>
                        <p class="card-text">Get ready for an exciting community sports festival! Open to all age groups with various sports activities and contests.</p>
                    </div>
                </div>
            </div>

            <!-- Advertisement 3 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300.png?text=Ad+3" class="card-img-top" alt="Ad 3">
                    <div class="card-body">
                        <h5 class="card-title">Health & Wellness Seminar</h5>
                        <p class="card-text">Join our free health and wellness seminar focusing on mental health, nutrition, and physical fitness. Open to all residents.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Information or Call to Action -->
        <p class="mt-4">For more announcements and promotional events, visit our community center or follow our social media pages.</p>
    </div>
</section>
     <!-- Events Section -->
     <section id="events" class="pt-5 mt-5">
        <div class="container">
            <h2>Upcoming Events</h2>
            <p>This section displays upcoming events in the barangay.</p>
            
            @if($events->isEmpty())
                <p>No upcoming events at the moment. Please check back later.</p>
            @else
                <div class="row">
                    @foreach($events as $event)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $event->title }}</h5>
                                    <p class="card-text">{{ $event->description }}</p>
                                    <p class="card-text"><small class="text-muted">{{ $event->event_date->format('F j, Y') }}</small></p>
                                    <p class="card-text"><strong>Location:</strong> {{ $event->location }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <!-- SK Program Section -->
<section id="sk-program" class="pt-5 mt-5">
    <div class="container">
        <h2>SK Program</h2>
        <p>The Sangguniang Kabataan (SK) is committed to providing youth-oriented programs and activities that foster community involvement, leadership, and development among the youth in our barangay.</p>
        
        <!-- List of Sample SK Programs -->
        <div class="row">
            <!-- Program 1 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300.png?text=SK+Program+1" class="card-img-top" alt="SK Program 1">
                    <div class="card-body">
                        <h5 class="card-title">Youth Leadership Training</h5>
                        <p class="card-text">A series of workshops designed to enhance leadership skills, teamwork, and community engagement among the youth.</p>
                    </div>
                </div>
            </div>

            <!-- Program 2 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300.png?text=SK+Program+2" class="card-img-top" alt="SK Program 2">
                    <div class="card-body">
                        <h5 class="card-title">Clean and Green Project</h5>
                        <p class="card-text">An environmental awareness program that encourages youth participation in community clean-up drives and tree-planting activities.</p>
                    </div>
                </div>
            </div>

            <!-- Program 3 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x300.png?text=SK+Program+3" class="card-img-top" alt="SK Program 3">
                    <div class="card-body">
                        <h5 class="card-title">Sports Fest</h5>
                        <p class="card-text">Annual sports events that promote health, fitness, and camaraderie among the youth through various sports competitions.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Information or Call to Action -->
        <p class="mt-4">For more information on upcoming SK programs and events, please contact the SK Office or visit our Facebook page.</p>
    </div>
</section>
    <!-- Citizens Charter Section -->
    <!-- Citizens Charter Section -->
<section id="citizens-charter" class="pt-5 mt-5">
    <div class="container">
        <h2>Citizens Charter</h2>
        <p>Pursuant to Section 6 of R.A 9485</p>
        <p><strong>Vision:</strong> Centro 2: An exemplar Barangay with unified, disciplined, and God-loving constituents towards prosperity</p>
        <p><strong>Mission:</strong> To provide satisfactory services through democratic leadership that would enable the people to become politically responsible, morally upright, and economically capable</p>
        
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
                    <tr>
                        <td>Issuance of Clearances and Certificate (CTC)</td>
                        <td>
                            1. Filling-up of Request Slip <br>
                            2. Receiving/Recording of request <br>
                            3. Processing of requested document <br>
                            4. Release of Certificate of CTC
                        </td>
                        <td>
                            Officer of the Day <br>
                            Jene Lea T. Aurelio (Barangay Secretary) <br>
                            Donalyn M. Tamayo (Barangay Treasurer)
                        </td>
                        <td>
                            1. 3 minutes <br>
                            2. 2 minutes <br>
                            3. 5 minutes <br>
                            4. 2 minutes
                        </td>
                        <td>None</td>
                        <td>₱5.00 Basic Tax plus 0.001% of his/her preceding annual income</td>
                    </tr>
                    <tr>
                        <td>Issuance of Clearances and Certifications</td>
                        <td>
                            1. Filling-up of Request Slip <br>
                            2. Receiving/Recording of request <br>
                            3. Processing of requested document <br>
                            4. Releasing of documents
                        </td>
                        <td>
                            Officer of the Day <br>
                            Jene Lea T. Aurelio (Barangay Secretary) <br>
                            Donalyn M. Tamayo (Barangay Treasurer) <br>
                            Camilo P. Perdido (Punong Barangay)
                        </td>
                        <td>
                            1. 4 minutes <br>
                            2. 3 minutes <br>
                            3. 12 minutes <br>
                            4. 5 minutes
                        </td>
                        <td>CTC <br> Valid ID <br> Barangay Clearance</td>
                        <td>₱100.00 - ₱150.00 - ₱200.00<br> Note: Certificate of Indigency is free of charge</td>
                    </tr>
                    <tr>
                        <td>Filing of Summons</td>
                        <td>
                            1. Approval of request slip <br>
                            2. Filing of Complaint Form in the record book <br>
                            3. Recording of the same in the logbook <br>
                            4. Scheduling of hearings
                        </td>
                        <td>
                            Officer of the Day <br>
                            Jene Lea T. Aurelio (Barangay Secretary) <br>
                            Camilo P. Perdido (Punong Barangay)
                        </td>
                        <td>
                            1. 2 minutes <br>
                            2. 1 minute <br>
                            3. 1 minute <br>
                            4. 1 minute
                        </td>
                        <td>CTC</td>
                        <td>₱100.00</td>
                    </tr>
                    <tr>
                        <td>Issuance of Permit</td>
                        <td>
                            1. Filling-up of Request Slip <br>
                            2. Receiving/Recording of request <br>
                            3. Processing of requested permit <br>
                            4. Paying of fees <br>
                            5. Approving/Issuing of requested document
                        </td>
                        <td>
                            Officer of the Day <br>
                            Jene Lea T. Aurelio (Barangay Secretary) <br>
                            Donalyn M. Tamayo (Barangay Treasurer) <br>
                            Camilo P. Perdido (Punong Barangay)
                        </td>
                        <td>
                            1. 3 minutes <br>
                            2. 2 minutes <br>
                            3. 10 minutes <br>
                            4. 3 minutes <br>
                            5. 3 minutes
                        </td>
                        <td>CTC and Barangay Clearance</td>
                        <td>
                            Barangay Clearance - ₱20.00<br>
                            Barangay Certification - ₱20.00<br>
                            Barangay Clearance w/ Photo - ₱30.00<br>
                            Transport Clearance/Certificate - ₱20.00<br>
                            PC - Lights/Water - ₱30.00<br>
                            Building Permit - ₱80.00<br>
                            Bldg. Clearance - ₱80.00<br>
                            Old/New Furniture Wooden Materials - ₱50.00<br>
                            Gymnasium Rent - ₱50.00
                        </td>
                    </tr>
                    <tr>
                        <td>Health Services</td>
                        <td>
                            1. Filling-up of Request Slip <br>
                            2. Evaluating of request <br>
                            3. Check-up (if needs medical attention)
                        </td>
                        <td>
                            Brgy. Health Workers <br>
                            Julie Grace L. Torida (Midwife)
                        </td>
                        <td>
                            1. 5 minutes <br>
                            2. 5 minutes <br>
                            3. 20 minutes
                        </td>
                        <td>CTC</td>
                        <td>Free</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p>Note: Each frontline service shall be given two (2) days processing time extension.</p>
        <p><strong>Service Pledge:</strong> "We the Officers of Barangay Centro 2 promise to provide and prompt & genuine service to our constituents."</p>
    </div>
</section>
<!-- Barangay Officials Section -->
<div id="officials" class="pt-5 mt-5">
    <div class="container">
        <h1>Barangay Officials</h1>
        <div class="wrapper text-center">
            <img class="img-cpt mb-3" src="https://via.placeholder.com/400x300.png?text=Cartoon+Image+2" alt="">
            <h2>Camilo P. Perdido</h2>
            <h3>Punong Barangay</h3>
        </div>

        <div class="wrapper-2 mt-5">
            <ul class="list-unstyled">
                <li class="d-inline-block mx-2">
                    <img class="img-kagawad mb-2" src="https://via.placeholder.com/400x300.png?text=Cartoon+Image+2">
                    <h3>Estrelita C. Estabillo</h3>
                    <p>SB Member</p>
                </li>
                <li class="d-inline-block mx-2">
                    <img class="img-kagawad mb-2" src="https://via.placeholder.com/400x300.png?text=Cartoon+Image+2">
                    <h3>Vicky C. Fuertes</h3>
                    <p>SB Member</p>
                </li>
                <li class="d-inline-block mx-2">
                    <img class="img-kagawad mb-2" src="https://via.placeholder.com/400x300.png?text=Cartoon+Image+2">
                    <h3>Recto S. Obispo</h3>
                    <p>SB Member</p>
                </li>
            </ul>
        </div>

        <div class="wrapper-3 mt-5">
            <ul class="list-unstyled">
                <li class="d-inline-block mx-2">
                    <img class="img-kagawad mb-2" src="https://via.placeholder.com/400x300.png?text=Cartoon+Image+2" alt="">
                    <h3>Andrew L. Pagayatan</h3>
                    <p>SB Member</p>
                </li>
                <li class="d-inline-block mx-2">
                    <img class="img-kagawad mb-2" src="https://via.placeholder.com/400x300.png?text=Cartoon+Image+2" alt="">
                    <h3>Almie Joy D. Cabuyadao</h3>
                    <p>SB Member</p>
                </li>
                <li class="d-inline-block mx-2">
                    <img class="img-kagawad mb-2" src="https://via.placeholder.com/400x300.png?text=Cartoon+Image+2" alt="">
                    <h3>Darwin R. Callangan</h3>
                    <p>SB Member</p>
                </li>
                <li class="d-inline-block mx-2">
                    <img class="img-kagawad mb-2" src="https://via.placeholder.com/400x300.png?text=Cartoon+Image+2" alt="">
                    <h3>Alfonso S. Grande Jr.</h3>
                    <p>SB Member</p>
                </li>
            </ul>
        </div>
    </div>
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