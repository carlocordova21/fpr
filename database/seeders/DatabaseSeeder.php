<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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

        $tipo_usuario_admin_id = \App\Models\TipoUsuario::where('nombre', 'administrador')->pluck('id')->first();
        \App\Models\User::create([
            'name' => 'Carlo Cordova',
            'email' => 'carloandrecordova21@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'tipo_usuario_id' => $tipo_usuario_admin_id,
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::factory(40)->create();

        \App\Models\RubroProveedor::insert([
            ['nombre' => 'salud'],
            ['nombre' => 'tecnología'],
            ['nombre' => 'educación'],
            ['nombre' => 'diseño'],
        ]);

        \App\Models\Proveedor::factory(20)->create();

        \App\Models\ServicioProveedor::factory(40)->create();
    }
}
