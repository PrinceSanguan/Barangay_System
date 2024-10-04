<?php

use App\Models\BrgyInhabitant;
use App\Models\Event;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Route;

/* NOTE: Do Not Remove
/ Livewire asset handling if using sub folder in domain
*/
Livewire::setUpdateRoute(function ($handle) {
    return Route::post(env('ASSET_PREFIX', '').'/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(env('ASSET_PREFIX', '').'/livewire/livewire.js', $handle);
});
/*
/ END
*/

Route::get('/', function () {
    // Fetch only published events, ordered by event date
    $events = Event::where('published', true)->orderBy('event_date', 'asc')->get();

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

    // Pass data to the view
    return view('welcome', compact('events', 'totalPopulation', 'maleCount', 'femaleCount', 'ageGroups', 'siteSetting'));
});
