<?php

namespace App\Http\Controllers\Api;

use JWTAuth;
use JWTAuthException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $token = null;

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'response' => 'error',
                    'message' => 'invalid_credentials',
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'response' => 'error',
                'message' => 'failed_to_create_token',
            ]);
        }

        //happy!
        return response()->json([
            'response' => 'success',
            'result' => [
                'token' => $token,
            ],
        ]);
    }

    public function me(Request $request)
    {
        $user = JWTAuth::toUser($request->get('token'));

        return response()->json([
            'response' => 'success',
            'result' => [
                'user' => $user,
            ],
        ]);
    }
}
