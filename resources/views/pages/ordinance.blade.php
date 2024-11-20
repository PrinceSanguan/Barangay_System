@extends('layouts.app')

@section('content')
<div class="container py-5" style="margin-top: 100px;">
    <div class="row">
        <!-- Sidebar Navigation -->
        <div class="col-lg-3 mb-4">
            <div class="list-group shadow-sm">
                <a href="#ordinances" class="list-group-item list-group-item-action">Ordinance</a>
                <a href="#resolution" class="list-group-item list-group-item-action">Resolution</a>
                <a href="#assocfound" class="list-group-item list-group-item-action">Assocfound</a>
    
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="col-lg-9">
            <!-- Chairperson Information Section -->
            <section id="chairperson-info" class="mb-5 text-center p-4" style="background-color: #f9f9f9; border-radius: 8px;">
                <h2 class="mb-4" style="font-weight: bold; color: #333;">Association And Foundation</h2>
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
            <section id="ordinances" class="mb-5">
                <h2 class="mb-4" style="font-weight: bold; color: #333;">Ordinance</h2>
                <ul>
                    @foreach($ordinances as $ord)
                        <li><strong>{{ $ord->name }}</strong> - {{ $ord->description }}</li>
                    @endforeach
                </ul>
            </section>
              <!-- hospital Section -->
              <section id="resolution" class="mb-5">
                <h2 class="mb-4" style="font-weight: bold; color: #333;">Resolution</h2>
                <ul>
                    @foreach($resolutions as $reso)
                        <li><strong>{{ $reso->name }}</strong> - {{ $reso->description }}</li>
                    @endforeach
                </ul>
            </section>

            <!-- Hotels Section -->
            <section id="assocfound" class="mb-5">
                <h2 class="mb-4" style="font-weight: bold; color: #333;">Association & Foundation</h2>
                <ul>
                    @foreach($assocfound as $assoc)
                        <li><strong>{{ $assoc->name }}</strong> - {{ $assoc->description }}</li>
                    @endforeach
                </ul>
            </section>

        </div>
    </div>
</div>
@endsection