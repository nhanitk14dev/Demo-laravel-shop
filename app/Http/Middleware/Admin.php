<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class Admin
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
         if (Auth::guard($guard)->check()) {
             if(Auth::user()->hasPermission('admin.index')) {
                return $next($request);
             }
         }
         return redirect('admin/login');
     }
}
