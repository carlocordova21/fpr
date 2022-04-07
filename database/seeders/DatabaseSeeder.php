<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\TipoUsuario::insert([
            ['nombre' => 'administrador'],
            ['nombre' => 'proveedor'],
            ['nombre' => 'cliente'],
        ]);
        \App\Models\User::factory(20)->create();
        \App\Models\RubroProveedor::insert([
            ['nombre' => 'salud'],
            ['nombre' => 'tecnología'],
            ['nombre' => 'educación'],
            ['nombre' => 'diseño'],
        ]);
    }
}
