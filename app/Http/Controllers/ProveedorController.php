<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProveedorResource;
use App\Models\Proveedor;
use App\Models\RubroProveedor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProveedorController extends Controller
{
    public function enviarSolicitud(Request $request) {
        $validator = Validator::make(
            array_merge($request->all(), ['user_id' => auth()->user()->id]), 
            [
                'user_id' => [
                    'required',
                    Rule::exists('users', 'id')->where(function($query) {
                        return $query->where('tipo_usuario_id', 3);
                    }),
                    'unique:proveedor,user_id',
                ],
                'ruc' => 'required|unique:proveedor|size:11',
                'razon_social' => 'string|max:100',
                'rubro_proveedor_id' => 'required|exists:rubro_proveedor,id',
                'descripcion' => 'required|string|max:255',
                'estado' => 'boolean'
            ]
        );

        if($validator->fails()) {
            return response()->json($validator->errors());
        }

        $validated = $validator->validated();
        return response()->json(Proveedor::create($validated), 201);
    }

    public function index() {
        return ProveedorResource::collection(Proveedor::paginate(10));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarPorRubro($rubro_proveedor_id)
    {
        return ProveedorResource::collection(Proveedor::where('rubro_proveedor_id', $rubro_proveedor_id)->paginate(10));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        return new ProveedorResource($proveedor);
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
        $validator = Validator::make(
            $request->only(['descripcion']), 
            ['descripcion' => 'required|string|max:255']
        );

        if($validator->fails()) {
            return response()->json($validator->errors());
        }

        $validated = $validator->validated();

        $res = $proveedor->update($validated);

        if($res) {
            return response()->json(['message' => 'Proveedor actualizado correctamente']);
        }
        return response()->json(['message' => 'Error para actualizar el proveedor'], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        if($proveedor->estado == 1) {
            $proveedor->estado = 0;
            $res = $proveedor->save();
            return response()->json(['message' => 'Proveedor Deshabilitado']);

            if($res) {
                return response()->json(['message' => 'Error para actualizar el proveedor'], 500);
            }
        }

        return response()->json(['message' => 'El proveedor ya se encuentra deshabilitado']);
    }
}
