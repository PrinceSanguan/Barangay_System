<?php

use App\Http\Controllers\brgycaptainController;
use App\Http\Controllers\CitezensCharterController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SkProgramController;
use App\Http\Controllers\VisitorsController;
use App\Models\Announcement;
use App\Models\BHW;
use App\Models\BrangayOfficials;
use App\Models\brgyActivity;
use App\Models\BrgyCaptainCorner;
use App\Models\brgyFestival;
use App\Models\BrgyInhabitant;
use App\Models\Chairperson;
use App\Models\Church;
use App\Models\Event;
use App\Models\Hospital;
use App\Models\Hotel;
use App\Models\LatestNews;
use App\Models\Location;
use App\Models\Park;
use App\Models\Program;
use App\Models\Restaurant;
use App\Models\School;
use App\Models\Schoolar;
use App\Models\SiteSetting;
use App\Models\Skprogram;
use App\Models\TouristSpot;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/* NOTE: Do Not Remove
/ Livewire asset handling if using sub folder in domain
*/
// Livewire::setUpdateRoute(function ($handle) {
//     return Route::post(env('ASSET_PREFIX', '').'/livewire/update', $handle);
// });

// Livewire::setScriptRoute(function ($handle) {
//     return Route::get(env('ASSET_PREFIX', '').'/livewire/livewire.js', $handle);
// });
/*
/ END
*/
Route::get('/', function () {
    // Fetch events
    $events = Event::orderBy('created_at', 'desc')->take(3)->get();

    // Fetch demographic statistics
    $totalPopulation = BrgyInhabitant::count();
    $maleCount = BrgyInhabitant::where('sex', 'Male')->count();
    $femaleCount = BrgyInhabitant::where('sex', 'Female')->count();

    $ageGroups = [
        '0-17' => BrgyInhabitant::whereBetween('age', [0, 17])->count(),
        '18-35' => BrgyInhabitant::whereBetween('age', [18, 35])->count(),
        '36-60' => BrgyInhabitant::whereBetween('age', [36, 60])->count(),
        '60+' => BrgyInhabitant::where('age', '>', 60)->count(),
    ];

    // Fetch site settings
    $siteSetting = SiteSetting::first();

    // Fetch other models
    $touristSpots = TouristSpot::all();
    $restaurants = Restaurant::all();
    $hotels = Hotel::all();
    $parks = Park::all();
    $schools = School::all();
    $hospitals = Hospital::all();
    $churches = Church::all();
    $skPrograms = Skprogram::all();
    $brgyActivities = brgyActivity::all();
    $brgyFestival = brgyFestival::all();
    $LatestNews = LatestNews::all();

    // Fetch Barangay Officials
    $barangayOfficials = BrangayOfficials::all();
    $barangayHealthWorker = BHW::all();

    // Fetch programs
    $programs = Program::all();
    $testimonials = Schoolar::all();

    // Fetch announcements
    $announcements = Announcement::all();
    $location = Location::all();

    // Fetch chairperson data
    $chairperson = BrgyCaptainCorner::latest()->first();

    // Pass data to the view
    return view('pages.welcome', compact(
        'events',
        'totalPopulation',
        'maleCount',
        'femaleCount',
        'ageGroups',
        'siteSetting',
        'touristSpots',
        'restaurants',
        'hotels',
        'parks',
        'schools',
        'hospitals',
        'churches',
        'skPrograms',
        'barangayOfficials',
        'programs',
        'testimonials',
        'announcements',
        'location',
        'chairperson',
        'brgyActivities',
        'barangayHealthWorker',
        'brgyFestival',
        'LatestNews',
    ));
});
Route::get('/map', [LocationController::class, 'showMap']);

Route::get('/send-test-email', function () {
    Mail::raw('This is a test email from Mailtrap!', function ($message) {
        $message->to('test@example.com')
            ->subject('Mailtrap Test Email');
    });

    return 'Test email sent!';
});
Route::get('/events/{id}', [EventController::class, 'show'])->name('event.details');
Route::get('/barangay-captain/details', [brgycaptainController::class, 'showCaptainDetails'])->name('barangay.captain.details');
Route::get('/visitors-lounge', [VisitorsController::class, 'showVisitors'])->name('visitors.lounge');
Route::get('/citizens-charter', [CitezensCharterController::class, 'showIndex'])->name('citizens.charter');
// Define a route that uses the controller
Route::get('/sk-programs', [SkProgramController::class, 'index']);
Route::get('/ordinance', [VisitorsController::class, 'ShowOrdinance'])->name('assoc.foundation');
