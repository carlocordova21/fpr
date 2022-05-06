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
            ['nombre' => 'salud', 'url_img_rubro' => 'https://owh-wh-d9-prod.s3.amazonaws.com/s3fs-public/blog-images/CatchUptoGetAheadTheRoleofHealthcareProvidersinGettingChildrenUptoDateonVaccines.png'],
            ['nombre' => 'tecnología', 'url_img_rubro' => 'https://gestion.pe/resizer/40rS0mSTdklFrN_rwBFxk6frRjE=/980x0/smart/filters:format(jpeg):quality(75)/cloudfront-us-east-1.images.arcpublishing.com/elcomercio/TBIWSBPRTBHXZPX5UJI7YP2Y6M.jpg'],
            ['nombre' => 'educación', 'url_img_rubro' => 'https://images.theconversation.com/files/421302/original/file-20210915-17-1dhh4oe.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1200&h=1200.0&fit=crop'],
            ['nombre' => 'diseño', 'url_img_rubro' => 'https://www.senati.edu.pe/sites/default/files/2017/carrera/11/carrera-dual-diseno-grafico-senati-1800x1190.jpg
            '],
        ]);

        \App\Models\Proveedor::factory(20)->create();

        \App\Models\ServicioProveedor::factory(40)->create();
    }
}
