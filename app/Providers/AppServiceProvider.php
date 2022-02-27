<?php

namespace App\Providers;

use App\Repositories\CompaniesRepository;
use App\Repositories\ICompaniesRepository;
use App\Repositories\IJobsRepository;
use App\Repositories\ILanguagesRepository;
use App\Repositories\ILevelsRepository;
use App\Repositories\IRolesRepository;
use App\Repositories\IToolsRepository;
use App\Repositories\JobsRepository;
use App\Repositories\LanguagesRepository;
use App\Repositories\LevelsRepository;
use App\Repositories\RolesRepository;
use App\Repositories\ToolsRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
        ICompaniesRepository::class => CompaniesRepository::class,
        ILevelsRepository::class => LevelsRepository::class,
        IRolesRepository::class => RolesRepository::class,
        ILanguagesRepository::class => LanguagesRepository::class,
        IToolsRepository::class => ToolsRepository::class,
        IJobsRepository::class => JobsRepository::class,
    ];
}
