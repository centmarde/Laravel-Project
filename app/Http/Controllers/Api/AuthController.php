<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //Login using the specified resource
    public function login(UserRequest $request)
    {
        $user = User::where('email', $request->email)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $response = [
            'user' => $user,
            'token' => $user->createToken($request->email)->plainTextToken
        ];

        return $response;
    }

    //logout using the specified resource
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        $response = [
            'message' => 'Logged out successfully'
        ];
        return $response;
    }
} 
