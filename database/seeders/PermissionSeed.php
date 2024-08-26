<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'manageuser']);
        Permission::create(['name' => 'managenews']);
        Permission::create(['name' => 'manageproduct']);
        Permission::create(['name' => 'managebanner']);
        Permission::create(['name' => 'managepermission']);
        Permission::create(['name' => 'managerole']);
        Permission::create(['name' => 'managewebsite']);


        $superrole = Role::create(['name' => 'supreme administrator']);
        $superrole->syncPermissions(['manageuser','managenews','manageproduct','managebanner','managepermission','managerole','managewebsite']);

        $role1 = Role::create(['name' => 'admin']);
        $role1->syncPermissions(['manageuser','managenews','manageproduct','managebanner','managewebsite']);

        $role2 = Role::create(['name' => 'user']);
        $role2->syncPermissions(['managenews']);

        $user = \App\Models\User::factory()->create([
            'name' => 'สิทธิพล',
            'username' => 'sittipol.do',
            'email' => 'sittipol@gmail.com',
            'is_admin' => 1,
            'password' => bcrypt('sittipol1123'),
        ]);

        $user2 = \App\Models\User::factory()->create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'is_admin' => 1,
            'password' => bcrypt('password'),
        ]);

        $user3 = \App\Models\User::factory()->create([
            'name' => 'ศุภมิตร',
            'username' => 'supamit',
            'email' => 'supamit.ja@gmail.com',
            'is_admin' => 1,
            'password' => bcrypt('123456789'),
        ]);

        $user->assignRole($superrole);
        $user3->assignRole($superrole);
        $user2->assignRole($role1);
    }
}
