<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CourseRepository;
use App\Repositories\Contracts\CourseRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\CourseEnrollmentRepository;
use App\Repositories\Contracts\CourseEnrollmentRepositoryInterface;

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

        $this->app->bind(
            CourseEnrollmentRepositoryInterface::class,
            CourseEnrollmentRepository::class
        );
    }

    public function boot(): void
    {
        //
    }
}