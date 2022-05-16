<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProveedorResource;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function aprobarSolicitud(Proveedor $proveedor)
    {
        if($proveedor->estado == 0) {
            $proveedor->estado = 1;
            $proveedor->save();  

            return 'Nuevo usuario registrado';
        }
        return 'La solicitud del usuario ya fue aprobada';
    }

    public function solicitudesPendientes() {
        return ProveedorResource::collection(Proveedor::where('estado', 0)->paginate(15));
    }
}
