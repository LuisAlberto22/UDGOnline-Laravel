<?php

namespace Database\Seeders;

use App\Models\visibility;
use Illuminate\Database\Seeder;

class visibilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        visibility::create([
            'visibility' => 'Publico'
            ]);
        visibility::create([
            'visibility' => 'Privado'
            ]);
    }
}
