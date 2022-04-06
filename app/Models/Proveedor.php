<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedor';
    protected $fillable = ['ruc', 'razon_social', 'rubro_proveedor_id', 'descripcion'];
}
