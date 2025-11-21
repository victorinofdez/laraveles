<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    //
    function __construct () {
        $this->middleware('auth:api')->except(['login', 'register']);
        //$this->middleware('auth:api')->only(['logout', 'user']);
    }
    
     function login (Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
        return response()->json(['message' => 'Unauthorized'], 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Access Token');
        $token = $tokenResult->token;
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
        ]);
    }
    
    
     function logout () {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'logged out']);
    }
    
     function register (Request $request) {
        $request->validate([
            'email' => 'required|string|email|unique:users',
            'name' => 'required|string',
            'password' => 'required|string',
        ]);
        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);
        return response()->json(['message' => 'User created'], 201);
    }
    
    function user(Request $request) {
        return response()->json($request->user());
    }
}
