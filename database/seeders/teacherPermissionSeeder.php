<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class teacherPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role2 = Role::create(['name' => 'Maestro']);
        Permission::create(['name' => 'clases.tareas.create'])->assignRole($role2);
        Permission::create(['name' => 'clases.videos.create'])->assignRole($role2);
        Permission::create(['name' => 'clases.tareas.store'])->assignRole($role2);
        Permission::create(['name' => 'clases.tareas.edit'])->assignRole($role2);
        Permission::create(['name' => 'clases.tareas.students'])->assignRole($role2);
        Permission::create(['name' => 'clases.tareas.students.review'])->assignRole($role2);
        Permission::create(['name' => 'clases.students.show'])->assignRole($role2);
        Permission::create(['name' => 'clases.tareas.destroy'])->assignRole($role2);
    }
}
