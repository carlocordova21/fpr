<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\RubroProveedor;

class Proveedor extends Model
{
    use HasFactory;
    protected $table = 'proveedor';
    protected $fillable = [
        'user_id',
        'ruc', 
        'razon_social',
        'rubro_proveedor_id', 
        'descripcion',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function aprobados() {
        return Proveedor::where('estado', 1);
    }

    public function pendientes() {
        return Proveedor::where('estado', 0);
    }

    public function rubro() {
        return $this->belongsTo(RubroProveedor::class, 'rubro_proveedor_id');
    }
}
