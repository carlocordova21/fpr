<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RubroProveedor extends Model
{
    use HasFactory;
    protected $table = 'rubro_proveedor';
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
