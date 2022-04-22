<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // public function register(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required|string|unique:users',
    //         'razon_social' => 'string|max:150',
    //         'password' => 'required|string|min:8',
    //         'tipo_usuario_id' => 3,
    //         'remember_token' => Str::random(10)
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json($validator->errors());
    //     }
    //     $user = User::create($request->validated());

    //     auth()->login($user);
    // }

    
}
