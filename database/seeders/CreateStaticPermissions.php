<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateStaticPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superUser = User::create([
            'name' => "Muhammet",
            'email' => "m_akkurt@live.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $admin = User::create([
            'name' => "Muhammet",
            'email' => "admin@admin.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        Permission::create(['name' => 'create tasks' , 'guard_name' => 'web']);
        Permission::create(['name' => 'edit tasks' , 'guard_name' => 'web']);
        Permission::create(['name' => 'delete tasks', 'guard_name' => 'web']);

        Permission::create(['name' => 'create tasks' , 'guard_name' => 'api']);
        Permission::create(['name' => 'edit tasks' , 'guard_name' => 'api']);
        Permission::create(['name' => 'delete tasks', 'guard_name' => 'api']);

        $superAdminRole = Role::create(['name' => 'Super Admin']);
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('create tasks');
        $adminRole->givePermissionTo('edit tasks');
        $adminRole->givePermissionTo('delete tasks');

        $editorRole = Role::create(['name' => 'editor']);
        $adminRole->givePermissionTo('create tasks');
        $editorRole->givePermissionTo('edit tasks');

        $superUser->assignRole('Super Admin');
        $admin->assignRole('admin');

        Role::create(['name' => 'user']);
    }
}
