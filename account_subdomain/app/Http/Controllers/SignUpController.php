<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgentesPerfil;
use App\Models\Agentes;
use App\Models\TokenAutenticacoes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\RateLimiter; 

class SignUpController extends Controller
{
    public function signUp(Request $request){

        $session_id = session_id();
        $executed = RateLimiter::attempt(
            'send-message:'.$session_id,
            $perMinute = 10,
            function() {
                //Número limte de requisições atingida
            },
            $decayRate = 60,
        );
         
        if (!$executed) {
            return response()->json([
                'mensagens_de_erro' =>  [ 'mensagem' => "Too many requests"],
            ], 429);
        }

        // regras de validação
        $regras = [
            'codigo' => 'bail|required|uuid',
            'user_cadastrar' => 'bail|required|min:3|max:50|regex:/^\S+$/',
            'password' => 'bail|required|min:8|max:50|regex:/^\S+$/',
            'password_confirm' => 'bail|required|same:password',
        ];

        // mensagens das regras de validação
        $feedback = [
            'codigo.required' => 'Preencha o campo código de cadastro.',
            'codigo.uuid' => 'Código de cadastro inválido.',
            'user_cadastrar.required' => 'Preencha o campo nome de usuário.',
            'user_cadastrar.min' => 'O nome de usuário deve ter pelo menos 3 caracteres.',
            'user_cadastrar.max' => 'O nome de usuário deve ter no máximo 50 caracteres.',
            'user_cadastrar.regex' => 'O nome de usuário não deve ter espaços.',
            'password.required' => 'Preencha o campo senha.',
            'password.min' => 'A senha deve ter pelo menos 8 caracteres.',
            'password.max' => 'A senha deve ter no máximo 50 caracteres.',
            'password.regex' => 'A senha não deve ter espaços.',
            'password_confirm.required' => 'Preencha o campo confirmar senha.',
            'password_confirm.same' => 'As senhas devem ser iguais.'
        ];

        // processo de validação dos dados
        $validacao = Validator::make($request->all(), $regras, $feedback);

        // se a validação falhar, é retornado mensagens no formato json
        if ($validacao->fails()) {
            return response()->json([
                'mensagens_de_erro' => $validacao->messages(),
            ], 422);
        }

        $token = $request->get('codigo');
        $user = $request->get('user_cadastrar');
        $password = $request->get('password');

        // verifica se o código de cadastro existe na base de dados e se é válido
        $token_autenticacao = new TokenAutenticacoes();
        $existe = $token_autenticacao->where('token_uuid', '=' , $token)->where('usado', '=', 'NÃO')->get()->first();
        if(isset($existe->token_uuid)){  

            // verifica se o nome de usuário já existe
            $cadastro = new Agentes();
            $usuario = $cadastro->where('username', '=' , $user)->get()->first();

            if(isset($usuario->username)){
                return response()->json([
                    'mensagens_de_erro' =>  [ 'mensagem' => "Nome de usuário inválido!"],
                ], 409);
            }else{
                // Armazena os dados de cadastro na base dados para criação de conta
                $cadastro->admin = '0';
                $cadastro->nome_agente = $existe->usuario;
                $cadastro->username = $user;
                $cadastro->password = $password;
                $cadastro->save();
                $existe->usado = 'SIM';
                $existe->save();
                $usuario = $cadastro->where('username', '=', $user)->get()->first();
                // Cria o perfil para a conta criada
                $perfil_agente = new AgentesPerfil();
                $perfil_agente->fk_id_agente = $usuario->id;
                $perfil_agente->membro_desde = '2023-01-01';
                $perfil_agente->descricao = "Alguma coisa";
                $perfil_agente->fk_foto_perfil = "481cacb0-aaa7-45a3-ab5d-e256793abe35";
                $perfil_agente->patente = 'Recruta';
                $perfil_agente->save();
                return response()->json([
                    'confirmacao' => "Conta criada com sucesso!",
                ], 201);
            }
        }else{
            return response()->json([
                'mensagens_de_erro' => [ 'mensagem' => "Não foi possível criar uma conta!"],
            ], 406);
        }

    }
}
