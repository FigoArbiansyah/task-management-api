<?php

namespace App\Http\Middleware;

use App\Helpers\ApiResponseHelper;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return ApiResponseHelper::error(401, 'Unauthorized', null);
        }
        return $next($request);
    }
}
