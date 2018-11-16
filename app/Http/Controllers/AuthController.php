<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    private $request;
    private $expiresIn;

    public function __construct(Request $request) {
        $this->middleware('guard');
        $this->middleware('throttle:60,1');
        $this->request = $request;
        $this->expiresIn = floatval(env('JWT_EXPIRES', '3600'));
    }

    protected function jwt(User $user) {
        $payload = [
            'iss' => "milo-backoffice",   // Issuer of the token
            'sub' => $user->id,     // Subject of the token
            'iat' => time(),        // Time when JWT was issued.
            'exp' => time() + $this->expiresIn // Expiration time
        ];

        return JWT::encode($payload, env('JWT_SECRET'));
    }

    public function login() {
        $this->validate($this->request, [
            'username'  => 'required',
            'password'  => 'required'
        ]);

        $user = User::where('username', $this->request->input('username'))->first();
        if (!$user) {
            return api_response('username or password is invalid', null, 401);
        }

        if (!Hash::check($this->request->input('password'), $user->password)) {
            return api_response('username or password is invalid', null, 401);
        }

        Auth::login($user);

        $response = [
            'token' => $this->jwt($user),
            'refreshToken' => null,
            'expiresIn' => $this->expiresIn
        ];

        return api_response('login successfull', $response);
    }
}
