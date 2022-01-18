<?php

namespace Database\Seeders;

use App\Models\Role as ModelsRole;
use Illuminate\Database\Seeder;
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
        Role::create(['name' => ModelsRole::ROLE_SUPER_ADMIN, 'guard_name' => 'admin']);

        Role::create(['name' => ModelsRole::ROLE_ADMIN, 'guard_name' => 'admin']);
        
        Role::create(['name' => ModelsRole::ROLE_USER, 'guard_name' => 'admin']);

        Role::create(['name' => ModelsRole::ROLE_AGENT, 'guard_name' => 'admin']);
    }
}
