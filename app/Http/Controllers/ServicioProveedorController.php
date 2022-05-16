<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServicioProveedorResource;
use App\Models\Proveedor;
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
        $proveedor = Proveedor::where('user_id', auth()->user()->id)
                    ->where('estado', 1)
                    ->get();

        if (empty($proveedor)) {
            $validator = Validator::make(
                array_merge($request->except(['proveedor_id']), ['proveedor_id' => $proveedor->id]),
                [
                    'proveedor_id' => 'required|exists:proveedor,id',
                    'descripcion' => 'required|string|max:255',
                    'precio_base' => 'required|between:0,9999.99',
                    'descripcion_adicional' => 'string|max:255',
                    'precio_adicional' => 'between:0,9999.99',
                    'url_img_servicio' => 'required|url'
                ]
            );

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $validated = $validator->validated();
            return response()->json(ServicioProveedor::create($validated), 201);
        }

        if(isset($proveedor->estado)) {
            if ($proveedor->estado == 0) {
                return response()->json([
                    'message' => 'El usuario actual no esta habilitado como proveedor'
                ]);
            }
        }

        return response()->json([
            'message' => 'El usuario actual no es proveedor'
        ]);
    }

    public function listarPorProveedor($proveedor_id)
    {
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
    public function update(Request $request, ServicioProveedor $servicio)
    {
        $validator = Validator::make(
            $request->except(['id', 'proveedor_id']),
            [
                'descripcion' => 'required|string|max:255',
                'precio_base' => 'required|between:0,9999.99',
                'descripcion_adicional' => 'string|max:255',
                'precio_adicional' => 'between:0,9999.99',
                'url_img_servicio' => 'required|url'
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $validated = $validator->validated();

        $res = $servicio->update($validated);

        if($res) {
            return response()->json(['message' => 'Servicio actualizado correctamente']);
        }
        return response()->json(['message' => 'Error para actualizar el servicio'], 500);
    }

    public function cambiarEstado(ServicioProveedor $servicio)
    {
        $servicio->estado = !$servicio->estado;
        $servicio->save();
        
        if($servicio->estado) {
            return response()->json(['message' => 'El servicio ha sido habilitado']);
        }

        return response()->json(['message' => 'Servicio deshabilitado']);
    }
}
