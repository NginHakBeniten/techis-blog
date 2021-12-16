<?php

namespace App\Http\Middleware;

use App\Helpers\ResponseHelper;
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
    public function handle($request, Closure $next)
    {
        if (!Auth::user()->is_admin) {
            return ResponseHelper::errorResponse('Permission Denied.', Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
