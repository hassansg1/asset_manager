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
        $user = User::find($user->id);
        $role = Role::updateOrCreate(["name" => "Super Admin"], ["name" => "Super Admin"]);
        $user->assignRole("Super Admin");
//        $crud = ['company', 'unit', 'site', 'subsite', 'building', 'room', 'cabinet', 'asset','user', 'networks_list', 'systems', 'rights', 'user_ids', 'vendors', 'installed_softwares', 'softwares', 'software_components', 'installed_patches', 'patches', 'firewall_managments', 'risks', 'risk_assessments'];
//
//        foreach ($crud as $cr) {
            Permission::updateOrCreate(["name" => 'Import Export'], ["name" => 'Import Export', 'guard_name' => 'web', 'group' => 'Import Export']);
            Permission::updateOrCreate(["name" => 'Standard Compliance'], ["name" => 'Standard Compliance', 'guard_name' => 'web', 'group' => 'Standard Compliance']);
            Permission::updateOrCreate(["name" => 'Approvel Requests'], ["name" => 'Approvel Requests', 'guard_name' => 'web', 'group' => 'Approvel Requests']);
            Permission::updateOrCreate(["name" => 'Logs'], ["name" => 'Logs', 'guard_name' => 'web', 'group' => 'Logs']);
            Permission::updateOrCreate(["name" => 'Task'], ["name" => 'Task', 'guard_name' => 'web', 'group' => 'Task']);
            Permission::updateOrCreate(["name" => 'Document library'], ["name" => 'Document library', 'guard_name' => 'web', 'group' => 'Document library']);
//            Permission::updateOrCreate(["name" => 'Export ' . $cr], ["name" => 'Export ' . $cr, 'guard_name' => 'web', 'group' => $cr]);
//        }

        $role->syncPermissions(getAllPermissions());


        // \App\Models\User::factory(10)->create();

//        $role = Role::create(['name' => 'Administrator'])
//            ->givePermissionTo(['List company']);
    }
}
