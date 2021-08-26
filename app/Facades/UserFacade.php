<?php

namespace App\Facades;

use App\Services\User\UserServiceInterface;
use Illuminate\Support\Facades\Facade;

class UserFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return UserServiceInterface::class;
    }
}
