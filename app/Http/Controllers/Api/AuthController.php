<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiResponse;
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            "name" => $validated['name'],
            "email" => $validated['email'],
            "password" => Hash::make($validated['password']),
            "biodata" => $validated['biodata']
        ]);
        return $this->apiSuccess([
            'user' => $user,
            'token' => $user->createToken('auth_token')->plainTextToken
        ], "Register Success");
    }
    public function login(LoginRequest $req)
    {
        $validated = $req->validated();

        if (!Auth::attempt($validated)) {
            return $this->apiError('Credentials not match', Response::HTTP_UNAUTHORIZED, "Wrong email or password account");
        }

        $user = User::where('email', $validated['email'])->first();
        return $this->apiSuccess([
            'user' => $user,
            'token' => $user->createToken('auth_token')->plainTextToken
        ]);
    }
}
