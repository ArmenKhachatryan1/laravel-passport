<?php

namespace App\Providers;

use App\Repository\Vendor\ClientRepository;
use App\Repository\Vendor\TokenRepository;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\ClientRepository as PassportClientRepository;
use Laravel\Passport\Passport;
use Laravel\Passport\TokenRepository as PassportTokenRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PassportClientRepository::class, ClientRepository::class);
        $this->app->bind(PassportTokenRepository::class, TokenRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Passport::enablePasswordGrant();
        Passport::tokensExpireIn(now()->addYear());
    }
}
