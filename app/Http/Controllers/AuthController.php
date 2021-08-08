<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->get('email'))->first();

        if (!$user) {
            return redirect()->back();
        } else if (!Hash::check($request->get('password'), $user->password)) {
            return redirect()->back();
        }

        $payload = [
            "iss" => "http://127.0.0.1:8000",
            "aud" => "http://127.0.0.1:8000/api/admin/login",
            "iat" => 1356999524,
            "nbf" => 1357000000,
            'mil' => $user->email,
            'ssw' => $user->password,
        ];

        $token = JWT::encode($payload, env('JWT_SECRET'), 'HS256');

        return response()->view('company')->withCookie(cookie('access-token', $token));
    }

    public function logout(Request $request)
    {
        return response()->view('welcome')->withCookie(cookie('access-token', 'logout'));
    }
}
