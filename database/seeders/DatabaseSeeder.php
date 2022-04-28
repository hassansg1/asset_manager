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
//        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $user = \App\Models\User::updateOrCreate(
            [
                "email" => "admin@assetmanager.com",
            ],
            [
                "rec_id" => "1",
                "first_name" => "Admin",
                "last_name" => "Admin",
                "designation_id" => "1",
                "department_id" => "1",
                "username" => "arslan.abid",
                "status" => "1",
                "password" => Hash::make("123456789"),
            ]);

        $user = User::find(1);

        Role::updateOrCreate(["name" => "Super Admin"], ["name" => "Super Admin"]);

        $user->assignRole("Super Admin");
//        $crud = ['company', 'unit', 'site', 'subsite', 'building', 'room', 'cabinet', 'asset','user', 'networks_list', 'systems', 'rights', 'user_ids', 'vendors', 'installed_softwares', 'softwares', 'software_components', 'installed_patches', 'patches', 'firewall_managments', 'risks', 'risk_assessments'];
//
//        foreach ($crud as $cr) {
//            Permission::updateOrCreate(["name" => 'See ' . $cr], ["name" => 'See ' . $cr, 'guard_name' => 'web', 'group' => $cr]);
//            Permission::updateOrCreate(["name" => 'List ' . $cr], ["name" => 'List ' . $cr, 'guard_name' => 'web', 'group' => $cr]);
//            Permission::updateOrCreate(["name" => 'View ' . $cr], ["name" => 'View ' . $cr, 'guard_name' => 'web', 'group' => $cr]);
//            Permission::updateOrCreate(["name" => 'Create ' . $cr], ["name" => 'Create ' . $cr, 'guard_name' => 'web', 'group' => $cr]);
//            Permission::updateOrCreate(["name" => 'Edit ' . $cr], ["name" => 'Edit ' . $cr, 'guard_name' => 'web', 'group' => $cr]);
//            Permission::updateOrCreate(["name" => 'Delete ' . $cr], ["name" => 'Delete ' . $cr, 'guard_name' => 'web', 'group' => $cr]);
//            Permission::updateOrCreate(["name" => 'Export ' . $cr], ["name" => 'Export ' . $cr, 'guard_name' => 'web', 'group' => $cr]);
//        }

        // \App\Models\User::factory(10)->create();

//        $role = Role::create(['name' => 'Administrator'])
//            ->givePermissionTo(['List company']);
    }
}
