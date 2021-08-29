<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;

class CrmAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::where("email", "admin@admin.admin")->first();
        $admin_role = Role::where("name", "admin")->first();

        if($user && $user->hasRole("admin")){
            return 0;
        }elseif ($user){
            $user->attachRole($admin_role);

            $user->save();
            return 0;
        }

        $user = User::create([
            "name" => "admin",
            "email" => "admin@admin.admin",
            "password" => bcrypt("password"),
        ]);


        $user->attachRole($admin_role);

        $user->save();

        return 0;

    }
}
