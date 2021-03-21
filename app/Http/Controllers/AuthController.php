<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\LoginConfirm;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public $userInfo;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(User $userInfo)
    {
        $this->userInfo = $userInfo;
    }

    /**
     * Register account
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $credentials = $request->only('name', 'password');
        $credentials['password'] = Hash::make($credentials['password']);
        $this->userInfo->create($credentials);

        return response()->json(['message' => 'Successfully register']);
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if ($token = JWTAuth::attempt($credentials)) {
            $user = Auth::user();
            event(new LoginConfirm($user));

            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized']);
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer'
        ]);
    }
}
