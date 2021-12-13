<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SuperAdminMiddleware
{
    

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::user()->is_admin) {
            return response()->json([
                'data' => null,
                'message' => 'Unauthorized',
                'status_code' => Response::HTTP_UNAUTHORIZED
            ]);
        }

        return $next($request);
    }
}
