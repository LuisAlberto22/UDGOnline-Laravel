<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class studentPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Alumno']);
        Permission::create(['name' => 'clases.tareas.alumno.upload'])->assignRole($role1);
        Permission::create(['name' => 'clases.tareas.alumno.destroy'])->assignRole($role1);
    }
}
