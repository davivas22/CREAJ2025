<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ClearNullSessionsMiddleware
{
     /**
     * Maneja la solicitud.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Limpiar sesiones donde `user_id` es null
        DB::table('sessions')->whereNull('user_id')->delete();

        return $next($request);
    }
}
