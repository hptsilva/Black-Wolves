<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgentesPerfil;
use App\Models\FotosPerfil;
use App\Models\Agentes;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    public function configuracoesConta(Request $request, string $name){
        if ($name != $_SESSION['nome']){
            return redirect()->route('useraccount', ['name' => $_SESSION['nome']]);
        } else {
            return view('site.conta.user_account');
        }
    }

    // Processa solicitação para alterar a senhar do usuário
    public function alterarSenha(Request $request){

        $nova_senha = $request->get('new_password');
        $nova_senha_confirma = $request->get('new_password_confirm');
        $senha_antiga = $request->get('old_password');

        if(!isset($nova_senha_confirma) || !isset($nova_senha) || !isset($senha_antiga)){
            return response()->json([
                'sucesso' => false,
                'mensagem' => "<div class=\"alert  alert-danger\" role=\"alert\">Preencha todos os campos!</div>",
            ]);
        }

        if(strlen($nova_senha) < 8) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => "<div class=\"alert  alert-danger\" role=\"alert\">A nova senha deve ter no mínimo 8 caracteres!</div>",
            ]);
        }
        
        if(strlen($nova_senha) > 50) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => "<div class=\"alert  alert-danger\" role=\"alert\">A nova senha deve ter no máximo 50 caracteres!</div>",
            ]);
        }
        
        $espacosEmBranco = " ";
        if(strpbrk($nova_senha, $espacosEmBranco)){
            return response()->json([
                'sucesso' => false,
                'mensagem' => "<div class=\"alert  alert-danger\" role=\"alert\">A nova senha não deve ter espaços!</div>",
            ]);
        }

        $id_user = $_SESSION['id'];
        $user = new Agentes();
        $conta = $user->where('id', '=', $id_user)->get()->first();

        if(isset($conta)){
            if (Hash::check($request->get('old_password'), $conta->password)) {
                if ($request->get('new_password') == $request->get('new_password_confirm')) {
                    $conta->password = $request->get('new_password');
                    $conta->save();
                    return response()->json([
                            'sucesso' => true,
                            'mensagem' => "<div class=\"alert  alert-success\" role=\"alert\">Senha alterada com sucesso!</div>",
                    ]);
                }
                return response()->json([
                        'sucesso' => false,
                        'mensagem' => "<div class=\"alert  alert-danger\" role=\"alert\">O campo confirmar senha deve ser igual a nova senha!</div>",
                ]);
            } else {
                return response()->json([
                    'sucesso' => false,
                    'mensagem' => "<div class=\"alert  alert-danger\" role=\"alert\">Não foi possível alterar a senha!</div>",
                ]);
            }
        } else {
            return response()->json([
                'sucesso' => false,
                'mensagem' => "<div class=\"alert  alert-danger\" role=\"alert\">Não foi possível alterar a senha!</div>",
            ]);
        }
    }

    public function alterarNome(Request $request) {


        $nome_agente = $request->get('nome_agente');
        if (!isset($nome_agente)){
            return response()->json([
                'sucesso' => false,
                'mensagem' => "<div class=\"alert  alert-danger\" role=\"alert\">Preencha todos os campos!</div>",
            ]);
        }
        $regex = '/^[a-zA-Z0-9_\-.]+$/';
        if(!preg_match($regex, $nome_agente)){
            return response()->json([
                'sucesso' => false,
                'mensagem' => "<div class=\"alert  alert-danger\" role=\"alert\">Coloque um nome válido!</div>",
            ]);
        }
        
        if($nome_agente == 'signin'){
            return response()->json([
                'sucesso' => false,
                'mensagem' => "<div class=\"alert  alert-danger\" role=\"alert\">Coloque um nome válido!</div>",
            ]);
        }

        if(strlen($nome_agente) < 3 || strlen($nome_agente) > 15){
            return response()->json([
                'sucesso' => false,
                'mensagem' => "<div class=\"alert  alert-danger\" role=\"alert\">O nome deve ter entre 3 e 15 caracteres!</div>",
            ]);
        }

        $agentes = new Agentes();
        $agente = $agentes->where('nome_agente', '=', $nome_agente)->get()->first();

        if(!isset($agente->nome_agente)){
            
            $conta = $agentes->where('id', '=', $_SESSION['id'])->get()->first();
            $conta->nome_agente = $nome_agente;
            $conta->save();
            $_SESSION['nome'] = $nome_agente;
            return response()->json([
                'sucesso' => true,
                'mensagem' => "<div class=\"alert  alert-success\" role=\"alert\">Nome alterado com sucesso! Atualize a página...</div>",
            ]);
        }
        else {
            return response()->json([
                'sucesso' => false,
                'mensagem' => "<div class=\"alert  alert-danger\" role=\"alert\">O nome já existe!</div>",
            ]);
        }
    }

    public function alterarFoto(Request $request){

        $foto = $request->get('foto');
        $fotos = new FotosPerfil();

        $fotos = $fotos->where('id', '=', $foto)->get()->first();

        if(isset($fotos->id)){

            $agente = new AgentesPerfil();
            $agente = $agente->where('fk_id_agente', '=', $_SESSION['id'])->get()->first();
            $agente->fk_foto_perfil = $foto;
            $agente->save();
            $_SESSION['id_foto_de_perfil'] = $foto;

            return response()->json([
                'sucesso' => true,
                'mensagem' => "<div class=\"alert  alert-success\" role=\"alert\">Foto alterada com sucesso! Atualize a página...</div>",
            ]);

        }else {
            return response()->json([
                'sucesso' => false,
                'mensagem' => "<div class=\"alert  alert-danger\" role=\"alert\">Não foi possível alterar a foto!</div>",
            ]);
        }

    }
}
