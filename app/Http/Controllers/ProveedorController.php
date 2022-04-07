<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProveedorController extends Controller
{
    public function enviarSolicitud(Request $request) {
        $validator = Validator::make($request->all(), [
            'ruc' => 'required|unique:proveedor|size:11',
            'razon_social' => 'string|max:150',
            'rubro_proveedor_id' => 'required|exists:rubro_proveedor,id',
            'descripcion' => 'required|alpha_dash|max:300',
            'estado' => 'boolean'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors());
        }

        $validated = $validator->validated();
        return response()->json(Proveedor::create($validated));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Proveedor::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function aprobarSolicitud(Request $request, Proveedor $proveedor)
    {
        $proveedor->update(["estado" => 1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        //
    }
}
