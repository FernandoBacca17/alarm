<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){

        $fields = $request->validate([
            'name'          => 'required|string',
            'last_name'     => 'required|string',
            'cc'            => 'required|string',
            'phone_number'  => 'required|max:10|string',
            'city'          => 'required|string',
            'email'         => 'required|string|unique:users,email',
            'password'      => 'required|string|confirmed',

        ]);

        $user = User::create([
            'name'          => $fields['name'],
            'last_name'     => $fields['last_name'],
            'cc'            => $fields['cc'],
            'phone_number'  => $fields['phone_number'],
            'city'          => $fields['city'],
            'email'         => $fields['email'],
            'password'      => Hash::make($fields['password']),
        ]);

        return response([
            'message' => 'Usuario registrado con exito'
        ]); 
    }

    public function login(Request $request){

        $fields = $request->validate([

            'email'         => 'required|string',
            'password'      => 'required|string',

        ]);

        //Check email.

        $user=User::where('email', $fields['email'])->first();
        
        //Check password.

        if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'Email o contraseña incorrectos'
            ], 401);
        }
    
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);   
    }

    public function logout(Request $request){

        auth()->user()->tokens()->delete();
        return[
            'message' => 'Sesión finalizada'
        ];
    }
}
