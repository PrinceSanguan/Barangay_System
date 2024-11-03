@extends('layouts.app')

@section('content')

<!-- Hero Section with Slider -->
<section id="hero" class="hero-section">
    @if(isset($siteSetting->slider_images) && count($siteSetting->slider_images) > 0)
        <div id="slider" class="carousel slide custom-slider" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($siteSetting->slider_images as $index => $image)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $image) }}" class="d-block w-100 slider-image" alt="Slider Image">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#slider" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#slider" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    @else
        <p class="text-center mt-4">No slider images available.</p>
    @endif
</section>
 <!-- Barangay Captain Section -->
 <section id="barangay-captain" class="barangay-captain-section py-5 bg-light">
    <div class="container">
        <h2 class="section-title">Message from the Barangay Captain</h2>
        @if(isset($chairperson))
            <div class="row align-items-center">
                <div class="col-md-4 text-center">
                    @if($chairperson->image)
                        <img src="{{ asset('storage/' . $chairperson->image) }}" alt="Barangay Captain" class="img-fluid rounded-circle captain-image">
                    @else
                        <img src="https://via.placeholder.com/150" alt="Barangay Captain" class="img-fluid rounded-circle captain-image"> <!-- Placeholder image -->
                    @endif
                </div>
                <div class="col-md-8">
                    <h3 class="captain-name">{{ $chairperson->name ?? 'Barangay Captain' }}</h3>
                    <p class="captain-designation">{{ $chairperson->designation ?? 'Barangay Captain' }}</p>
                    <p class="captain-message">{{ $chairperson->description ?? 'No message available.' }}</p>
                    
                    <!-- Button Link to More Details -->
                    <a href="{{ route('barangay.captain.details') }}" class="btn btn-primary mt-3">
                        Read More
                    </a>
                </div>
            </div>
        @else
            <p class="text-center">Barangay Captain's information is currently unavailable.</p>
        @endif
    </div>
</section>

<!-- About Section -->
<section id="about" class="about-section py-5">
    <div class="container">
        <h2 class="section-title">About Us</h2>
        <p class="section-description">{{ $siteSetting->about_text ?? 'About information not available.' }}</p>
    </div>
</section>

<!-- Demographic Stats Section -->
<section id="stats" class="stats-section py-5 bg-light">
    <div class="container">
        <h2 class="section-title">Demographic Statistics</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <p><strong>Total Population:</strong> {{ $totalPopulation }}</p>
            </div>
            <div class="col-md-4">
                <p><strong>Male Count:</strong> {{ $maleCount }}</p>
            </div>
            <div class="col-md-4">
                <p><strong>Female Count:</strong> {{ $femaleCount }}</p>
            </div>
        </div>
        <div class="age-groups mt-4">
            <h4>Age Groups</h4>
            <ul class="list-unstyled">
                @foreach($ageGroups as $ageRange => $count)
                    <li>{{ $ageRange }}: {{ $count }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="services-section py-5">
    <div class="container">
        <h2 class="section-title">Services</h2>
        <div class="row">
            @foreach($programs as $program)
                <div class="col-md-6">
                    <div class="service-item p-3 mb-4 bg-light">
                        <h3 class="service-title">{{ $program->name }}</h3>
                        <p class="service-description">{{ $program->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Barangay Officials Section -->
<section id="barangay-officials" class="barangay-officials-section py-5 bg-light">
    <div class="container">
        <h2 class="section-title">Barangay Officials</h2>
        <div class="row">
            @foreach($barangayOfficials as $official)
                <div class="col-md-4">
                    <div class="official p-3 mb-4 text-center">
                        <h3 class="official-name">{{ $official->name }}</h3>
                        <p class="official-designation">{{ $official->designation }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Announcements Section -->
<section id="announcements" class="announcements-section py-5">
    <div class="container">
        <h2 class="section-title">Announcements</h2>
        <div class="row">
            @foreach($announcements as $announcement)
                <div class="col-md-6">
                    <div class="announcement-item p-3 mb-4 bg-light">
                        <h3 class="announcement-title">{{ $announcement->title }}</h3>
                        <p class="announcement-description">{{ $announcement->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Events Section -->
<section id="events" class="events-section py-5 bg-light">
    <div class="container">
        <h2 class="section-title">Events</h2>
        <div class="row">
            @foreach($events as $event)
                <div class="col-md-6">
                    <div class="event-item p-3 mb-4">
                        <h3 class="event-title"><a href="{{ route('event.details', $event->id) }}">{{ $event->title }}</a></h3>
                        <p class="event-description">{{ $event->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials-section py-5">
    <div class="container">
        <h2 class="section-title">Our Scholars</h2>
        <div class="row">
            @foreach($testimonials as $testimonial)
                <div class="col-md-4">
                    <div class="testimonial-item p-3 mb-4 bg-light text-center">
                        <h3 class="testimonial-name">{{ $testimonial->name }}</h3>
                        <p class="testimonial-description">{{ $testimonial->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
