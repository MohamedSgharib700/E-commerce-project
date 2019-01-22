<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user() === null ||auth()->admin() === null)
        {
            return response('Accsess Denied', 401);
        }
        $actions = request()->route()->getAction();
        $roles = isset($actions['roles']) ? $actions['roles'] : null;
        if ((auth()->user()->hasAnyRole($roles) && $roles !== NULL) || (auth()->admin()->hasAnyRole($roles) && $roles !== NULL)) {
            return $next($request);
        }
        return response('Accsess Denied', 401);
    }

    //(auth()->user()->hasAnyRole($roles) && $roles !== NULL) || 
    //auth()->user() === null || 
}
