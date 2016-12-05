<?php

use Illuminate\Database\Seeder;
use Heymowski\RolesAndPermissions\Models\Role;
use Heymowski\RolesAndPermissions\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Role::create([
            'name' => 'manager',
            'label' => 'System Manager',
        ]);

        Role::create([
            'name' => 'editor',
            'label' => 'System Editor',
        ]);

        Role::create([
            'name' => 'user',
            'label' => 'System User',
        ]);

        // Asign All Permissions To Manager
        $allPermissions = Permission::pluck('id')->toArray();

        $manager = Role::whereName('manager')->first();
        
        $manager->syncPermissions($allPermissions);

        // Asign Manager Role To User ID 1
        $user = App\User::find(1);

        $user->assignRole('manager');
    }
}
