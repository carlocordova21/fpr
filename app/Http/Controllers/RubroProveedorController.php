<?php

namespace App\Http\Controllers;

use App\Models\RubroProveedor;
use Illuminate\Http\Request;

class RubroProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RubroProveedor::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RubroProveedor  $rubroProveedor
     * @return \Illuminate\Http\Response
     */
    public function show(RubroProveedor $rubro)
    {
        return response()->json([
            'rubro' => $rubro
        ]);
    }
}
