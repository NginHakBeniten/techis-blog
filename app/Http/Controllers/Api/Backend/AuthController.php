<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $this->validate($request, [
            'username' => 'required|exists:users',
            'password' => 'required'
        ]);

        if (!$token = auth()->attempt($credentials)) {
            return $this->errorResponse('Incorrect username or password.', Response::HTTP_UNAUTHORIZED);
        }

        $user = auth()->user();

        return $this->successResponse([
            'id' => $user->id,
            'username' => $user->username,
            'role' => $user->role,
            'is_admin' => $user->is_admin,
            'token' => $token
        ]);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return $this->successResponse(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return $this->successMessage('Successfully logged out');
    }
}
