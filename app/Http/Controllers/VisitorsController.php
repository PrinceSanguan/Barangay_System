<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\Church;
use App\Models\Hotel;
use App\Models\JobHiring;
use App\Models\Park;
use App\Models\Restaurant;
use App\Models\School;
use App\Models\TouristSpot;
use Illuminate\Http\Request;

class VisitorsController extends Controller
{
    public function showVisitors()
    {
        // Fetch site settings
        $siteSetting = SiteSetting::first();

        // Fetch data for the new sections
        $churches = Church::all();
        $hotels = Hotel::all();
        $jobOpportunities = JobHiring::all();
        $parks = Park::all();
        $restaurants = Restaurant::all();
        $schools = School::all();
        $touristSpots = TouristSpot::all();

        // Return the view with the data
        return view('pages.visitors-lounge', compact(
            'siteSetting',
            'churches',
            'hotels',
            'jobOpportunities',
            'parks',
            'restaurants',
            'schools',
            'touristSpots'
        ));
    }
}