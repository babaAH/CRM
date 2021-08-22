<?php

namespace App\Models;

use Laratrust\Models\LaratrustTeam;

class Team extends LaratrustTeam
{
    public $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, "role_user");
    }
}
