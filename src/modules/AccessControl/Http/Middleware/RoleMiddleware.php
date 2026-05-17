<?php

namespace App\Modules\AccessControl\Http\Midlleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        if(!$request->user() || !$request->user()->hasRole($role)){
            abort(404);
        }
        return $next($request);
    }
}
