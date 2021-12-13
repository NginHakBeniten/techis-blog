<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        return 'Login';
    }

}
