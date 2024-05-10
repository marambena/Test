<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController
{
 /**
     * Gère la tentative de connexion de l'utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentification réussie
            $user = Auth::user();
            $accessToken = $user->createToken('Personal Access Token')->accessToken;
            return response()->json(['user' => $user, 'access_token' => $accessToken]);
        } else {
            // Authentification échouée
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);

        }
 }
    }

