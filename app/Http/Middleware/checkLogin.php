<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class checkLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $admin=Role::findById(1);
        $staff=Role::findById(2);
        if(Auth::check()&&Auth()->user()->hasRole([$admin,$staff]))
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('loginPage');
        }

    }
}
