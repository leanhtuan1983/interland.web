<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $permissions = [
            'create-role',
            'edit-role',
            'delete-role',

            'create-user',
            'edit-user',
            'delete-user',

            'create-post',
            'edit-post',
            'delete-post',

            'create-category',
            'edit-category',
            'delete-category',

            'create-pages',
            'edit-pages',
            'delete-pages',

            'index-settings',

        ];
        foreach($permissions as $permission) {
            Permission::create(['name'=>$permission]);
        }
    }
}
