<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServicioProveedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $proveedores = \App\Models\Proveedor::pluck('id')->toArray();
        return [
            'proveedor_id' => $this->faker->randomElement($proveedores),
            'descripcion' => $this->faker->text(),
            'precio_base' => $this->faker->randomFloat(2, 20, 1000),
            'descripcion_adicional' => $this->faker->text(),
            'precio_adicional' => $this->faker->randomFloat(2, 20, 500),
        ];
    }
}
