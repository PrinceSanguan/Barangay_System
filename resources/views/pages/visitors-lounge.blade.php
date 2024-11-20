@extends('layouts.app')

@section('content')
<div class="container py-5" style="margin-top: 100px;">
    <div class="row">
        <!-- Sidebar Navigation -->
        <div class="col-lg-3 mb-4">
            <div class="list-group shadow-sm">
                <a href="#churches" class="list-group-item list-group-item-action">Churches</a>
                <a href="#hostitals" class="list-group-item list-group-item-action">Hospitals</a>
                <a href="#hotels" class="list-group-item list-group-item-action">Hotels</a>
                <a href="#job-opportunities" class="list-group-item list-group-item-action">Job Opportunities</a>
                <a href="#parks" class="list-group-item list-group-item-action">Parks</a>
                <a href="#restaurants" class="list-group-item list-group-item-action">Restaurants</a>
                <a href="#schools" class="list-group-item list-group-item-action">Schools</a>
                <a href="#tourist-spots" class="list-group-item list-group-item-action">Tourist Spots</a>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="col-lg-9">
            <!-- Chairperson Information Section -->
            <section id="chairperson-info" class="mb-5 text-center p-4" style="background-color: #f9f9f9; border-radius: 8px;">
                <h2 class="mb-4" style="font-weight: bold; color: #333;">Visitors Lounge</h2>
                <div class="row align-items-center">
                    {{-- <div class="col-md-4 text-center">
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
                    </div> --}}
                </div>
            </section>

            <!-- Churches Section -->
            <section id="churches" class="mb-5">
                <h2 class="mb-4" style="font-weight: bold; color: #333;">Churches</h2>
                <ul>
                    @foreach($churches as $church)
                        <li><strong>{{ $church->name }}</strong> - {{ $church->description }}</li>
                    @endforeach
                </ul>
            </section>
              <!-- hospital Section -->
              <section id="hospitals" class="mb-5">
                <h2 class="mb-4" style="font-weight: bold; color: #333;">Hospitals</h2>
                <ul>
                    @foreach($hospitals as $hospital)
                        <li><strong>{{ $hospital->name }}</strong> - {{ $hospital->description }}</li>
                    @endforeach
                </ul>
            </section>

            <!-- Hotels Section -->
            <section id="hotels" class="mb-5">
                <h2 class="mb-4" style="font-weight: bold; color: #333;">Hotels</h2>
                <ul>
                    @foreach($hotels as $hotel)
                        <li><strong>{{ $hotel->name }}</strong> - {{ $hotel->description }}</li>
                    @endforeach
                </ul>
            </section>

            <!-- Job Opportunities Section -->
            <section id="job-opportunities" class="mb-5">
                <h2 class="mb-4" style="font-weight: bold; color: #333;">Job Opportunities</h2>
                <ul>
                    @foreach($jobOpportunities as $job)
                        <li><strong>{{ $job->title }}</strong> - {{ $job->description }}</li>
                    @endforeach
                </ul>
            </section>

            <!-- Parks Section -->
            <section id="parks" class="mb-5">
                <h2 class="mb-4" style="font-weight: bold; color: #333;">Parks</h2>
                <ul>
                    @foreach($parks as $park)
                        <li><strong>{{ $park->name }}</strong> - {{ $park->description }}</li>
                    @endforeach
                </ul>
            </section>

            <!-- Restaurants Section -->
            <section id="restaurants" class="mb-5">
                <h2 class="mb-4" style="font-weight: bold; color: #333;">Restaurants</h2>
                <ul>
                    @foreach($restaurants as $restaurant)
                        <li><strong>{{ $restaurant->name }}</strong> - {{ $restaurant->description }}</li>
                    @endforeach
                </ul>
            </section>

            <!-- Schools Section -->
            <section id="schools" class="mb-5">
                <h2 class="mb-4" style="font-weight: bold; color: #333;">Schools</h2>
                <ul>
                    @foreach($schools as $school)
                        <li><strong>{{ $school->name }}</strong> - {{ $school->description }}</li>
                    @endforeach
                </ul>
            </section>

            <!-- Tourist Spots Section -->
            <section id="tourist-spots" class="mb-5">
                <h2 class="mb-4" style="font-weight: bold; color: #333;">Tourist Spots</h2>
                <ul>
                    @foreach($touristSpots as $spot)
                        <li><strong>{{ $spot->name }}</strong> - {{ $spot->description }}</li>
                    @endforeach
                </ul>
            </section>
        </div>
    </div>
</div>
@endsection