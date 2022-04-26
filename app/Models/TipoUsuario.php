<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory;
    protected $table = 'tipo_usuario';
    protected $fillable = ['nombre'];
    public $timestamps = false;

    public function users() {
        return $this->hasMany(User::class);
    }
}
