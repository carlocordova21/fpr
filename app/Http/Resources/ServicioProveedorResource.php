<?php

namespace App\Http\Resources;

use App\Models\Proveedor;
use Illuminate\Http\Resources\Json\JsonResource;

class ServicioProveedorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'proveedor' => Proveedor::findOrFail($this->proveedor_id),
            'descripcion' => $this->descripcion,
            'precio_base' => $this->precio_base,
            'descripcion_adicional' => $this->descripcion_adicional,
            'precio_adicional' => $this->precio_adicional,
            'url_img_servicio' => $this->url_img_servicio,
            'estado' => $this->estado,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
