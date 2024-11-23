<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\ActivityPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Spatie\Activitylog\Models\Activity;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Activity::class, ActivityPolicy::class);
        Gate::define('create-backup', fn (User $user) => $user->hasRole('super_admin'));
        Gate::define('download-backup', fn (User $user) => $user->hasRole('super_admin'));
        Gate::define('delete-backup', fn (User $user) => false);
    }
}
