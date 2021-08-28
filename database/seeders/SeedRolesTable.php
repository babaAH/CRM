<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class SeedRolesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
           [
               "name" => "Администратор",
               "display_name" => "Администратор портала",
               "description" => "",
           ],
            [
                "name" => "Сотрудник",
                "display_name" => "Сотрудник организации",
                "description" => "",
            ],
            [
                "name" => "Клиент",
                "display_name" => "Клиент организации",
                "description" => "",
            ],
            [
                "name" => "Поставщик",
                "display_name" => "Поставщик услуг",
                "description" => "",
            ],
        ]);
    }
}
