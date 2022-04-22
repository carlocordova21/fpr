<?php

namespace App\Observers;

use App\Models\Proveedor;

class ProveedorObserver
{
    public $afterCommit = true;

    /**
     * Handle the Proveedor "updated" event.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return void
     */
    public function updated(Proveedor $proveedor)
    {
        if($proveedor->estado == 1) {
            $proveedor->user->tipo_usuario_id = 2;
            $proveedor->user->save();
        }
    }
}
