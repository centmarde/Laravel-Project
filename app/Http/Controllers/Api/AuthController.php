<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //Login
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        
        return $user;
    }
}
