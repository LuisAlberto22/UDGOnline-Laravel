<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Alumno']);
        $role2 = Role::create(['name' => 'Maestro']);
        Permission::create(['name' => 'clases.tareas.create'])->assignRole($role2);
        Permission::create(['name' => 'clases.videos.create'])->assignRole($role2);
    }
}
