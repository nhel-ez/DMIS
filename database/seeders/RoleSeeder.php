<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create permissions
        Permission::create(['name' => 'search']);
        Permission::create(['name' => 'add']);
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'view']);
        Permission::create(['name' => 'manage acc']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'user']);
        $role1->givePermissionTo('search');

        $role2 = Role::create(['name' => 'Admin']);
        $role2->givePermissionTo('search');
        $role2->givePermissionTo('add');
        $role2->givePermissionTo('edit');
        $role2->givePermissionTo('view');


        $role3 = Role::create(['name' => 'SuperAdmin']);
        $role3->givePermissionTo(Permission::all());
        
        $sa1 = User::create([
            'name' => 'Super Admin',
            'email' => 'sa1@gmail.com',
            'password' => Hash::make('12341234')
        ]);
        $sa1->assignRole('SuperAdmin');
        $sa2 = User::create([
            'name' => 'Super Admin',
            'email' => 'sa2@gmail.com',
            'password' => Hash::make('12341234')
        ]);
        $sa2->assignRole('SuperAdmin');
        // create admin account
        $a1 = User::create([
            'name' => 'Admin',
            'email' => 'a1@gmail.com',
            'password' => Hash::make('12341234')
        ]);
        $a1->assignRole('Admin');

        $a2 = User::create([
            'name' => 'Admin',
            'email' => 'a2@gmail.com',
            'password' => Hash::make('12341234')
        ]);
        $a2->assignRole('Admin');

    }
}

