<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use App\Model\User;
use Symfony\Component\Routing\Route;

class AccessPremission
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
        if(Auth::user()->hasAnyRoles(['admin','author'])){
            return $next($request);
        }
        // if(Auth::user()->hasRole(['author'])){
        //     return $next($request);
        // }
        return redirect('/admin/home');
    }
}
