<?php

namespace App\Providers;

use App\Enums\PermissionsEnum;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

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
        Route::bind('user', function (int $id) {
            if (auth()->user() and auth()->user()->can(PermissionsEnum::USERS_INDEX->value)) {
                return User::where('id', $id)->firstOrFail();
            }
            if ($id === auth()->id()) {
                return User::where('id', $id)->firstOrFail();
            }
            return null;
        });
        Paginator::useBootstrap();
    }
}
