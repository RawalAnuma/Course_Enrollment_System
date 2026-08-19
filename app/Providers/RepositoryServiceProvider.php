<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CourseRepository;
use App\Repositories\Contracts\CourseRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\Contracts\UserRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            CourseRepositoryInterface::class,
            CourseRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}