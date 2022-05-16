<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServicioProveedorResource;
use App\Models\ServicioProveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServicioProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ServicioProveedorResource::collection(ServicioProveedor::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(), 
            [
                'proveedor_id' => 'required|exists:proveedor,id',
                'descripcion' => 'required|string|max:255',
                'precio_base' => 'string|max:100',
                'descripcion_adicional' => 'required|string|max:255',
                'precio_adicional' => 'required|string|max:255',
                'url_img_servicio' => 'boolean'
            ]
        );

        if($validator->fails()) {
            return response()->json($validator->errors());
        }

        $validated = $validator->validated();
        return response()->json(ServicioProveedor::create($validated), 201);
    }

    public function listarPorProveedor($proveedor_id) {
        return ServicioProveedorResource::collection(ServicioProveedor::where('proveedor_id', $proveedor_id)->paginate(10));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServicioProveedor  $servicioProveedor
     * @return \Illuminate\Http\Response
     */
    public function show(ServicioProveedor $servicio)
    {
        return new ServicioProveedorResource($servicio);
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
