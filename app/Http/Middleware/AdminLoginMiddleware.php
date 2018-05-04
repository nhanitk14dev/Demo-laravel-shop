<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;//sử dụng lệnh auth dd kiem tra
use Closure;

class AdminLoginMiddleware
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
        if(Auth::check())
        {
            $user = Auth::user();
            if($user->quyen == 1)//ktra quyen user dung ko
                return $next($request);
                
            else
                return redirect()->route('getLogin');
        }
        else
        {
            return redirect()->route('getLogin');
        }
        /* if(Auth::check() && Auth::user()->isAdmin()){
            return $next($request);
        }
        return redirect('home');*/
    }
}
