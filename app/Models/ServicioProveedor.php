<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioProveedor extends Model
{
    use HasFactory;
    protected $table = 'servicio_proveedor';
    protected $fillable = [
        'proveedor_id',
        'descripcion',
        'precio_base',
        'descripcion_adicional',
        'precio_adicional'
    ];
}
