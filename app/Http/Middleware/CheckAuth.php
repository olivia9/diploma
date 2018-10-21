<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class CheckAuth
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

       // echo Auth::user();
       // if(true)
         //   return redirect('login');
        //session()->push('user.id', 'developers');
        //var_dump(session('user'));
        return $next($request);
    }
}
