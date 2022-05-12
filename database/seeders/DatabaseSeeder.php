<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application"s database.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::updateOrCreate(
            [
                "email" => "superadmin@assetmanager.com",
            ],
            [
                "rec_id" => "1",
                "first_name" => "Super",
                "last_name" => "Admin",
                "designation_id" => "1",
                "department_id" => "1",
                "username" => "superadmin",
                "status" => "1",
                "password" => Hash::make("123456789"),
            ]);

        Role::updateOrCreate(["name" => "Super Admin"], ["name" => "Super Admin"]);

        $user->assignRole("Super Admin");
    }
}
