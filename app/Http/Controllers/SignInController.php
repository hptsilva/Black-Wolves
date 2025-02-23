<?php

namespace App\Http\Controllers;

use App\Models\AgentesPerfil;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use App\Models\Agentes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class SignInController extends Controller
{
    public function signIn(Request $request){

        $erro = $request->get('erro');
        if (isset($erro)){
            $mensagens = [
                'Too many requests...' => 'Erro 429',
                'O campo usuário é obrigatório' => 'Erro 400',
                'O campo senha é obrigatório' => 'Erro 400',
                'Erro de autenticação' => 'Erro 500',
                'Usuário não encontrado' => 'Erro 404',
                ];
            if (isset($mensagens[$erro])){
                return view('site.conta.signin', ['erro' => $erro]);
            }
            else {
                return redirect()->route('signin');
            }
        }
        return view('site.conta.signin');
    }

    public function autenticar(Request $request){

        $session_id = session_id();

        $executed = RateLimiter::attempt(
            'send-message:'.$session_id,
            $perMinute = 10,
            function() {
                // Número limite de requisições atingida, aguarde...
            },
            $decayRate = 120,
        );
         
        if (! $executed) {
            return response()->json([
                'mensagem' => ['mensagem' => 'Too many requests...'],
            ], 429);
        }
        //regras de autenticação
        $regras = [
            'user' => 'string',
            'password' => 'required',
        ];

        //Mensagens de resposta
        $feedback = [
            'user.string' => 'O campo usuário é obrigatório',
            'password.required' => 'O campo senha é obrigatório',
        ];

        $validacao = Validator::make($request->all(), $regras, $feedback);
        // se a validação falhar, é retornado mensagens no formato json
        if ($validacao->fails()) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => $validacao->messages(),
            ], 422);
        }

        $username = $request->get('user');
        $password = $request->get('password');
        
        $user = new Agentes();

        $conta = $user->where('username', '=' , $username)->get()->first();

        if(isset($conta->username)){

            if (Hash::check($password,$conta->password)) {
                $agentes_perfil = new AgentesPerfil();
                $perfil = $agentes_perfil->where('fk_id_agente', '=', $conta->id)->get()->first();
                if(isset($perfil->id)){
                    $_SESSION['id'] = $conta->id;
                    $_SESSION['nome'] = $conta->nome_agente;
                    $_SESSION['is_adm'] = $conta->admin;
                    $_SESSION['id_foto_de_perfil'] = $perfil->fk_foto_perfil;
                    $_SESSION['patente'] = $perfil->patente;
                    $_SESSION['autenticado'] = true;
                    return response()->json([
                        'mensagem' => 'Autenticado. Redirecionando...',
                    ], 202);
                } else {
                    return response()->json([
                        'mensagem' => ['mensagem' => 'Erro de autenticação'],
                    ], 500);
                }
            } else{
                return response()->json([
                    'mensagem' => ['mensagem' => 'Usuário e/ou senha inválidos'],
                ], 404);
            }
        }
        else{
            return response()->json([
                'mensagem' => ['mensagem' => 'Usuário e/ou senha inválidos'],
            ], 404);
        }
    }

}
