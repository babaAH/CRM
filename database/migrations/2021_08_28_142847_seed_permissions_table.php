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
