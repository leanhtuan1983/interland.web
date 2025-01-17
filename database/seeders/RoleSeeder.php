<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name'=>'Super Admin']);
        $admin = Role::create(['name'=>'Admin']);
        $member = Role::create(['name'=>"Member"]);

        $admin->givePermissionTo([
            'create-user','edit-user','delete-user','create-post','edit-post','delete-post','create-category','edit-category','delete-category'
        ]);
        $member->givePermissionTo([
            'create-post','edit-post','delete-post'
        ]);
    }
}
