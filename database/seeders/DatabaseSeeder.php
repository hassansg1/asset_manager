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
        $user = User::find(1);
        $role = Role::updateOrCreate(["name" => "Super Admin"], ["name" => "Super Admin"]);
        $user->assignRole("Super Admin");
//        $crud = ['company', 'unit', 'site', 'subsite', 'building', 'room', 'cabinet', 'asset','user', 'networks_list', 'systems', 'rights', 'user_ids', 'vendors', 'installed_softwares', 'softwares', 'software_components', 'installed_patches', 'patches', 'firewall_managments', 'risks', 'risk_assessments'];
//
//        foreach ($crud as $cr) {
            Permission::updateOrCreate(["name" => 'can-access-import-export'], ["name" => 'can-access-import-export', 'guard_name' => 'web', 'group' => 'can-access-import-export']);
            Permission::updateOrCreate(["name" => 'can-access-standard-compliance'], ["name" => 'can-access-standard-compliance', 'guard_name' => 'web', 'group' => 'can-access-standard-compliance']);
            Permission::updateOrCreate(["name" => 'can-access-approvel-requests'], ["name" => 'can-access-approvel-requests', 'guard_name' => 'web', 'group' => 'can-access-approvel-requests']);
            Permission::updateOrCreate(["name" => 'can-access-logs'], ["name" => 'can-access-logs', 'guard_name' => 'web', 'group' => 'can-access-logs']);
            Permission::updateOrCreate(["name" => 'can-access-task'], ["name" => 'can-access-task', 'guard_name' => 'web', 'group' => 'can-access-task']);
            Permission::updateOrCreate(["name" => 'can-access-document-liberary'], ["name" => 'can-access-document-liberary', 'guard_name' => 'web', 'group' => 'can-access-document-liberary']);
//            Permission::updateOrCreate(["name" => 'Export ' . $cr], ["name" => 'Export ' . $cr, 'guard_name' => 'web', 'group' => $cr]);
//        }

        $role->syncPermissions(getAllPermissions());


        // \App\Models\User::factory(10)->create();

//        $role = Role::create(['name' => 'Administrator'])
//            ->givePermissionTo(['List company']);
    }
}
