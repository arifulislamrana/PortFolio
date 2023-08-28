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
use App\Repository\BlogRepository\BlogRepository;
use App\Repository\BlogRepository\IBlogRepository;
use App\Repository\ContactRepository\ContactRepository;
use App\Repository\ContactRepository\IContactRepository;
use App\Repository\HomeRepository\IHomeRepository;
use App\Repository\HomeRepository\HomeRepository;
use App\Repository\ProjectRepository\IProjectRepository;
use App\Repository\ProjectRepository\ProjectRepository;
use App\Repository\ResumeRepository\IResumeRepository;
use App\Repository\ResumeRepository\ResumeRepository;
use App\Repository\ServiceRepository\IServiceRepository;
use App\Repository\ServiceRepository\ServiceRepository;
use App\Repository\SkillRepository\ISkillRepository;
use App\Repository\SkillRepository\SkillRepository;
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
        $this->app->bind(IResumeRepository::class, ResumeRepository::class);
        $this->app->bind(IServiceRepository::class, ServiceRepository::class);
        $this->app->bind(ISkillRepository::class, SkillRepository::class);
        $this->app->bind(IProjectRepository::class, ProjectRepository::class);
        $this->app->bind(IBlogRepository::class, BlogRepository::class);
        $this->app->bind(IContactRepository::class, ContactRepository::class);
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
