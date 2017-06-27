<?php

namespace App\Http\Middleware;

use Closure;

class Gobierno
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
        dd("Hola desde el middleware Gobierno");
        return $next($request);
    }
}
