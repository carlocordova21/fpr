<?php

namespace App\Http\Resources;

use App\Models\RubroProveedor;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ProveedorResource extends JsonResource
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
            'user' => User::findOrFail($this->user_id)->only(['id', 'name', 'email']),
            'ruc' => $this->ruc,
            'razon_social' => $this->razon_social,
            'rubro' => RubroProveedor::findOrFail($this->rubro_proveedor_id),
            'descripcion' => $this->descripcion,
            'url_img_proveedor' => $this->url_img_proveedor,
            'estado' => $this->estado,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
