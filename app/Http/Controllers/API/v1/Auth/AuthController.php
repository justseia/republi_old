<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use App\Mail\VerifyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json([
            'status' => '201',
            'message' => 'Successfully logged out'
        ]);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function register_componay(Request $request)
    {
        if (Company::where('email', $request->email)->exists()) {
            return response()->json([
                'status' => '400',
                'message' => 'Company already created',
            ], 400);
        }

        if (Company::where('username', $request->username)->exists()) {
            return response()->json([
                'status' => '400',
                'message' => 'Username exists',
            ], 400);
        }

        $file = $request->file('photo');
        $name = $file->hashName();
        $file->storeAs('public', $name);

        Company::create([
            'name' => $request['name'],
            'BIN/IIN' => $request['BIN/IIN'],
            'contact_person' => $request['contact_person'],
            'photo' => $name,
            'specialty' => $request['specialty'],
            'number' => $request['number'],
            'username' => $request['username'],
            'created_company' => $request['created_company'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return response()->json([
            'status' => '201',
            'message' => 'User created successfully',
        ], 201);
    }

    public function register(Request $request)
    {
        if (User::where('email', $request->email)->exists()) {
            return response()->json([
                'status' => '200',
                'message' => 'User already created',
            ], 200);
        }

        $file = $request->file('photo');
        $name = $file->hashName();
        $file->storeAs('public', $name);

        User::create([
            'full_name' => $request['full_name'],
            'birthday' => $request['birthday'],
            'photo' => $name,
            'number' => $request['number'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return response()->json([
            'status' => '201',
            'message' => 'User created successfully',
        ], 201);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
