<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *@param  \Closure  $next
     *@return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        //user vemos la autentificacion del usuario y despues comprobamos si es admin
        if ($user && $user->is_admin == true) {
            return $next($request);
        }

        return redirect()->route('unauthorized')->with('error', 'Acceso no autorizado');
    }
}
