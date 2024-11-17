<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class CitezensCharterController extends Controller
{
    public function showIndex() {

        $siteSetting = SiteSetting::first();
        return view('pages.citezens_charter', compact(
            
            'siteSetting',
        ));
    }
}
