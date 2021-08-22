<?php

namespace App\Facades;

use App\Services\TaskStatus\TaskStatusServiceInterface;
use Illuminate\Support\Facades\Facade;

class TaskStatusFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return TaskStatusServiceInterface::class;
    }
}
