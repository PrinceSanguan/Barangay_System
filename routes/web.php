<?php

use App\Models\Event;
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
    
    // Return the view and pass the $events variable to the view
    return view('welcome', compact('events'));
});
