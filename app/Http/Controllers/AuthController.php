<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;


class AuthController extends Controller
{
    //registro de clientes 
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|string|unique:users',
            'password' => 'required|string:min:4'
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->password = hash::make($request->password);

        if ($user->save()) {
            return response()->json([
                'message' => 'Usuario Registrado correctamente',
                'type' => 1
            ], 200);
        } else {
            return response()->json([
                'message' => 'Error Registrado el Usuario',
                'type' => 2
            ], 200);
        }
    }

    //Validando login 
    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'email' => 'required|string'
        ]);

        $credencial = request(['email', 'password']);

        if (!Auth::attempt($credencial)) {
            return response()->json([
                'message' => 'Usuario o Contraseña Inválida',
                'type' => 2
            ], 200);
        }
        if (Auth::attempt($credencial)) {
            $user = Auth::user();
            return response()->json([
                'message' => 'Acceso correcto',
                'type' => 1,
                'user' => $user->id

            ], 200);
        }
    }
}
