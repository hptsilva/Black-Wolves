<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        session_set_cookie_params(1200);
        session_start();
        if(isset($_SESSION['nome']) && $_SESSION['nome'] != '' && $_SESSION['is_adm'] == '1'){
            return $next($request);
        }else{
            return response()->json([
                'status_code' => "403",
                'mensagem' => "Acesso Negado",
            ],403);
        }
    }
}
