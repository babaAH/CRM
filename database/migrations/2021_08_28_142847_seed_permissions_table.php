<?php

use App\Models\Permission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Permission::insert(
            [
                "name" => "create-user",
                "display_name" => "Can create user",
                "description" => "",
            ],
            [
                "name" => "update-user",
                "display_name" => "Can update user",
                "description" => "",
            ],
            [
                "name" => "delete-user",
                "display_name" => "Can create user",
                "description" => "",
            ],
            [
                "name" => "read-user",
                "display_name" => "Can create task",
                "description" => "",
            ],
            [
                "name" => "create-task",
                "display_name" => "Can create task",
                "description" => "",
            ],
            [
                "name" => "update-task",
                "display_name" => "Can update task",
                "description" => "",
            ],
            [
                "name" => "delete-task",
                "display_name" => "Can create task",
                "description" => "",
            ],
            [
                "name" => "read-task",
                "display_name" => "Can create user",
                "description" => "",
            ],
            [
                "name" => "create-task-status",
                "display_name" => "Can create task-status",
                "description" => "",
            ],
            [
                "name" => "update-task-status",
                "display_name" => "Can update task-status",
                "description" => "",
            ],
            [
                "name" => "delete-task-status",
                "display_name" => "Can create task-status",
                "description" => "",
            ],
            [
                "name" => "read-task-status",
                "display_name" => "Can create task-status",
                "description" => "",
            ],
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
