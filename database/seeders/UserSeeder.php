<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('123456789')
        ]);
        $superAdmin->assignRole('Super Admin');
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
        $admin->assignRole('Admin');
        $member = User::create([
            'name' => 'Lê Anh Tuấn',
            'email' => 'leanhtuan1983@gmail.com',
            'password' => Hash::make('123456789')
        ]);
        $member->assignRole('Member');
    }
}
