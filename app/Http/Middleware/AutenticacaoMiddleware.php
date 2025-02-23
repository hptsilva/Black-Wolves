<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Agentes;
use App\Models\AgentesPerfil;

class AutenticacaoMiddleware
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
        if(isset($_SESSION['autenticado']) && $_SESSION['autenticado'] != '' && $_SESSION['autenticado'] === true){
            $agentes = new Agentes();
            $agentes_perfil = new AgentesPerfil();
            
            $id = $_SESSION['id'];
            $agente = $agentes->where('id', '=', $id)->get()->first();
            $perfil = $agentes_perfil->where('fk_id_agente', '=', $id)->get()->first();
            $_SESSION['id_foto_de_perfil'] = $perfil->fk_foto_perfil;
            $_SESSION['nome'] = $agente->nome_agente;
            $_SESSION['is_adm'] = $agente->admin;
            return $next($request);
        }else{
            return redirect()->route('signin');
        }
    }
}
