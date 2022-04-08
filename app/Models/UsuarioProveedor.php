<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioProveedor extends Model
{
    use HasFactory;
    protected $table = 'usuario_proveedor';
    protected $fillable = ['usuario_id', 'proveedor_id'];
    protected $timestamps = false;
}
