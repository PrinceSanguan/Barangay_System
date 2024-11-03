@extends('layouts.app')

@section('content')
<div class="container py-5" style="margin-top: 100px;">
    <div class="row">
        <!-- Sidebar Navigation -->
        <div class="col-lg-3 mb-4">
            <div class="list-group shadow-sm">
                <a href="#gallery" class="list-group-item list-group-item-action active">Gallery</a>
                <a href="#photo-release" class="list-group-item list-group-item-action">Photo Release</a>
                <a href="#speeches" class="list-group-item list-group-item-action">Speeches</a>
                <a href="#achievements" class="list-group-item list-group-item-action">Achievements</a>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="col-lg-9">
            <!-- Chairperson Information Section -->
            <section id="chairperson-info" class="mb-5 text-center p-4" style="background-color: #f9f9f9; border-radius: 8px;">
                <h2 class="mb-4" style="font-weight: bold; color: #333;">Message from the Barangay Captain</h2>
                <div class="row align-items-center">
                    <div class="col-md-4 text-center">
                        @if($chairperson && $chairperson->image)
                            <img src="{{ asset('storage/' . $chairperson->image) }}" alt="Barangay Captain" class="img-fluid rounded-circle captain-image" style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #ddd;">
                        @else
                            <img src="https://via.placeholder.com/150" alt="Barangay Captain" class="img-fluid rounded-circle captain-image" style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #ddd;">
                        @endif
                    </div>
                    <div class="col-md-8 text-left">
                        <h3 class="captain-name" style="font-size: 24px; font-weight: bold; color: #555;">{{ $chairperson->name ?? 'Barangay Captain' }}</h3>
                        <p class="captain-designation" style="color: #777;">{{ $chairperson->designation ?? 'Barangay Captain' }}</p>
                        <p class="captain-message" style="font-size: 16px; color: #333;">{{ $chairperson->description ?? 'No message available.' }}</p>
                    </div>
                </div>
            </section>

            <!-- Gallery Section -->
            <section id="gallery" class="mb-5">
                <h2 class="mb-4" style="font-weight: bold; color: #333;">Gallery</h2>
                <div class="row g-3">
                    @foreach($galleries as $gallery)
                        <div class="col-md-4 col-sm-6">
                            <a href="{{ asset('storage/' . $gallery->image) }}" data-lightbox="gallery">
                                <div class="card shadow-sm">
                                    <img src="{{ asset('storage/' . $gallery->image) }}" class="card-img-top" alt="{{ $gallery->title }}" style="border-radius: 8px; object-fit: cover; width: 100%; height: 150px;">
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>

            <!-- Photo Release Section -->
            <section id="photo-release" class="mb-5">
                <h2 class="mb-4" style="font-weight: bold; color: #333;">Photo Release</h2>
                <div class="row g-3">
                    @foreach($photoReleases as $release)
                        <div class="col-md-4 col-sm-6">
                            <div class="card shadow-sm">
                                <img src="{{ asset('storage/' . $release->image) }}" class="card-img-top" alt="{{ $release->title }}" style="border-radius: 8px; object-fit: cover; width: 100%; height: 150px;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $release->title }}</h5>
                                    <p class="card-text">{{ $release->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

            <!-- Speeches Section -->
            <section id="speeches" class="mb-5">
                <h2 class="mb-4" style="font-weight: bold; color: #333;">Speeches</h2>
                @foreach($speeches as $speech)
                    <div class="mb-3">
                        <h5>{{ $speech->title }}</h5>
                        <p>{{ $speech->content }}</p>
                    </div>
                @endforeach
            </section>

            <!-- Achievements Section -->
            <section id="achievements" class="mb-5">
                <h2 class="mb-4" style="font-weight: bold; color: #333;">Achievements</h2>
                @foreach($achievements as $achievement)
                    <div class="mb-3">
                        <h5>{{ $achievement->title }}</h5>
                        <p>{{ $achievement->description }}</p>
                    </div>
                @endforeach
            </section>
        </div>
    </div>
</div>

<!-- Lightbox CSS and JS for gallery images -->
<link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/js/lightbox.min.js"></script>

@endsection
