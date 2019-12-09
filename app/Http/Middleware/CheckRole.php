<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
class CheckRole
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
        if(auth()->user()->tipousuario != 1){
            dd(auth()->user()->tipousuario);
            return back()->with('respuesta-negativa', 'No puedes acceder a este lugar.');
        }else{
            return $next($request);
        }
        
    }
}
