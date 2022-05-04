<?php

namespace App\Http\Controllers;

use App\Models\ServicioProveedor;
use Illuminate\Http\Request;

class ServicioProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ServicioProveedor::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServicioProveedor  $servicioProveedor
     * @return \Illuminate\Http\Response
     */
    public function show(ServicioProveedor $servicio)
    {
        return response()->json([
            'servicio' => $servicio
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServicioProveedor  $servicioProveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServicioProveedor $servicioProveedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServicioProveedor  $servicioProveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServicioProveedor $servicioProveedor)
    {
        //
    }
}
