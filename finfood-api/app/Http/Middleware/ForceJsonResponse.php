<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceJsonResponse
{
    public function handle(Request $request, Closure $next)
    {
        // 1. Define o cabeçalho 'Accept' para 'application/json' na requisição.
        // Isso força o Laravel a tratar esta requisição como se estivesse pedindo JSON.
        $request->headers->set('Accept', 'application/json');

        // 2. Passa a requisição modificada para a próxima camada da aplicação.
        return $next($request);
    }
}
