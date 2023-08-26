<?php

namespace App\Providers;

use App\Repository\AboutRepository\AboutRepository;
use App\Repository\AboutRepository\IAboutRepository;
use App\Utility\Logger;
use App\Utility\ILogger;
use Illuminate\Support\ServiceProvider;
use App\Repository\BaseRepository\BaseRepository;
use App\Repository\UserRepository\UserRepository;
use App\Repository\BaseRepository\IBaseRepository;
use App\Repository\HomeRepository\IHomeRepository;
use App\Repository\HomeRepository\HomeRepository;
use App\Repository\UserRepository\IUserRepository;

class PortFolioProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IBaseRepository::class, BaseRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IHomeRepository::class, HomeRepository::class);
        $this->app->bind(IAboutRepository::class, AboutRepository::class);
        $this->app->bind(ILogger::class, Logger::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
