<?php

namespace App\Facades;


use App\Services\Task\TaskServiceInterface;
use Illuminate\Support\Facades\Facade;

class TaskFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return TaskServiceInterface::class;
    }
}
