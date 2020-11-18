<?php

namespace App\Providers;


use App\Repository\AdminRepository;
use App\Repository\AdminRepositoryInterface;
use App\Repository\TrainRepository;
use App\Repository\TrainRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->bind(TrainRepositoryInterface::class, TrainRepository::class);
    }
}
