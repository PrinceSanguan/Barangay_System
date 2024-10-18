<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Filament\Http\Controllers\Auth\RegisterController as FilamentRegisterController;
class RegisterController extends Controller
{
    protected function registered(Request $request, $user)
    {
        // Set a session flag indicating the user has just registered
        session(['registered' => true]);

        // You can still return a response if needed
        return redirect()->intended('/admin'); // This will not affect middleware redirection
    }
}