<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Autenticado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $status = session_status();
        if ($status == PHP_SESSION_ACTIVE){
            //Segue para o próximo fluxo;
        } else {
            session_start();
        }

        if(isset($_SESSION['id']) && $_SESSION['id'] != ''){
            return redirect()->route('useraccount', ['name' => $_SESSION['nome']]);
        }else{
            return $next($request);
        }
    }
}
