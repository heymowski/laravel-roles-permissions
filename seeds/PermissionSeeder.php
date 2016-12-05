<?php

use Illuminate\Database\Seeder;
use Heymowski\RolesAndPermissions\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $permissions = [

            // Articles Permissions
            [
                'name' => 'create_article',
                'label' => 'Create Article',
                'family' => 'Articles',
            ],
            [
                'name' => 'edit_article',
                'label' => 'Edit Article',
                'family' => 'Articles',
            ],
            [
                'name' => 'delete_article',
                'label' => 'Delete Article',
                'family' => 'Articles',
            ],
            // Photos Permissions
            [
                'name' => 'create_photo',
                'label' => 'Create Photo',
                'family' => 'Photos',
            ],
            [
                'name' => 'edit_photo',
                'label' => 'Edit Photo',
                'family' => 'Photos',
            ],
            [
                'name' => 'delete_photo',
                'label' => 'Delete Photo',
                'family' => 'Photos',
            ],

        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission['name'],
                'label' => $permission['label'],
                'family' => $permission['family'],
               ]);
        }
    }
}
