<?php

namespace App\Providers;

use App\Http\Responses\CustomRegistrationResponse;
use App\Policies\ActivityPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\Models\Activity;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       // Bind custom registration response to Filament

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Activity::class, ActivityPolicy::class);
        Route::middleware('web')->group(function () {
            if (session()->has('registered')) {
                session()->forget('registered'); // Clear the flag to prevent infinite loop
                Redirect::to(route('welcome'))->send(); // Redirect to the welcome page
            }
        });
    }
}