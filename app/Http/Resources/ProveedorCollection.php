<?php

namespace App\Http\Resources;

use App\Models\RubroProveedor;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProveedorCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'rubro' => $this->collection->first()->rubro,
        ];
    }
}
