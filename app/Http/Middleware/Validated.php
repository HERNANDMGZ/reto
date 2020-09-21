<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Validated
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
        $user = auth()->user();
        if(isset($user) && $user->status == 0){
            Auth::Logout();
            session()->put(['error' => 'No tienes permiso de ingresar']);
            return redirect()->route('login');

    }
        return $next($request);
    }
}

