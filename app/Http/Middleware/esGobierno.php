<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class esGobierno
{
    private $auth;
    public function __construct(Guard $auth){
        $this->auth = $auth;

    }
    public function handle($request, Closure $next)
    {
        if ($this->auth->user()->tipo_usuario != 0)
        {
            if ($request -> ajax()){
                return response('No autorizado',401);
            }
            else{
                return redirect()->to('home');
            }
        }
        return $next($request);
    }
}
