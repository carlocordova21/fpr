<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = \App\Models\User::pluck('id')->toArray();
        $rubrosProveedor = \App\Models\RubroProveedor::pluck('id')->toArray();

        return [
            'user_id' => $this->faker->unique()->randomElement($users),
            'ruc' => $this->faker->unique()->numberBetween(10000000000, 29999999999),
            'razon_social' => $this->faker->sentence(3),
            'rubro_proveedor_id' => $this->faker->randomElement($rubrosProveedor),
            'descripcion' => $this->faker->text(),
            'url_img_proveedor' => $this->faker->imageUrl(480, 480,'Proveedor', true),
            'estado' => $this->faker->boolean(),
        ]; 
    }
}
