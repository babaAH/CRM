<?php

namespace App\Providers;

use App\Services\Task\TaskService;
use App\Services\Task\TaskServiceInterface;
use App\Services\TaskStatus\TaskStatusService;
use App\Services\TaskStatus\TaskStatusServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TaskServiceInterface::class, TaskService::class);
        $this->app->bind(TaskStatusServiceInterface::class, TaskStatusService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
