<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
class checkCostumer
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
        $costumer=Role::findById(3);
        // if(Auth::check()&&Auth()->user()->hasRole([$costumer,$admin,$staff])&&Auth::user()->status==1)
        if(Auth::check()&&Auth::user()->status==1)
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('loginPage');
        }
    }
}
