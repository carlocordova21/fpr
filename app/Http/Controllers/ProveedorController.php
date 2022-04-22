<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProveedorController extends Controller
{
    public function enviarSolicitud(Request $request, User $user) {
        $validator = Validator::make(
            array_merge($request->all(), ['user_id' => $user->id]), [
            'user_id' => 'required|exists:users,id|unique:proveedor,user_id',
            'ruc' => 'required|unique:proveedor|size:11',
            'razon_social' => 'string|max:100',
            'rubro_proveedor_id' => 'required|exists:rubro_proveedor,id',
            'descripcion' => 'required|alpha_dash|max:255',
            'estado' => 'boolean'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors());
        }

        $validated = $validator->validated();
        return response()->json(Proveedor::create($validated), 201);
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
