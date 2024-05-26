<?php

namespace App\Providers;

use App\Repositories\Interfaces\OrganizationProfileRepositoryInterface;
use App\Repositories\OrganizationProfileRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(OrganizationProfileRepositoryInterface::class,OrganizationProfileRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
