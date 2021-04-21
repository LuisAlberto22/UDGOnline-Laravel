<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Usuario();

        $user->id = "217763768";
        $user->nombres = "Luis Alberto";
        $user->apellidop = "Garcia";
        $user->apellidom = "Orozco";
        $user->carrera = "Ingeniería en Computación";
        $user->tipo = "1";

        $user->save();
    }
}
