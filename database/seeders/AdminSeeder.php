<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name' => 'danujaf',
            'email' => 'ldashanfernando@gmail.com',
            'password' => Hash::make('asdfasdf')
        ]);

        $admin->assignRole(Role::ROLE_SUPER_ADMIN);
    }
}
