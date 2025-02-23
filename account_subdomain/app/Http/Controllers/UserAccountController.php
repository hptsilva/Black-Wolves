<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgentesPerfil;
use App\Models\Agentes;
use App\Models\Builds;
use App\Models\Screenshots;
use App\Models\Videos;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    // Enviar view de autenticação para o cliente
    public function signin(Request $request){

        $erro = $request->get('erro');
        if(isset($erro)){
            return view('signin', ['erro' => $erro]);
        }
        else {
            return view('signin');
        }
    }

    // Enviar view da página principal ao cliente.
    public function index(Request $request, $name){
        
        if ($name != $_SESSION['nome']){
            return redirect()->route('useraccount', ['name' => $_SESSION['nome']]);
        }else {
            return view("user_account.index");
        }
    }

    // Mostrar builds de Tom Clancy's The Division 2
    public function buildsTheDivision2(Request $request, $name){

        if ($name != $_SESSION['nome']){
            return redirect()->route('useraccount.builds.td2', ['name' => $_SESSION['nome']]);
        }else {
            $builds = new Builds();
            $classe = array(
                'dps' => 'Ofensivo',
                'gadget' => 'Utilitário',
                'tank' => 'Defensivo',
                'raid' => 'Raid',
            );
            $builds = $builds->where('fk_id_agente', '=', $_SESSION['id'])->orderBy('created_at')->paginate(3);
            if($builds != []){
                return view('user_account.builds_td2', ['builds' => $builds, 'classe' => $classe]);
            } else {
                return view('user_account.builds_td2');
            }
        }

    }

    // Mostrar midias de Tom Clancy's The Division 2
    public function midiaTheDivision2($name){
       
        if($name != $_SESSION['nome']){
            return redirect()->route('useraccount.midia.td2', ['name' => $_SESSION['nome']]);
        } else {
            $screenshots = new Screenshots();
            $videos = new Videos();
            $screenshots = $screenshots->where('fk_id_agente', '=', $_SESSION['id']);
            $midias = $videos->where('fk_id_agente', '=', $_SESSION['id'])->union($screenshots)->orderBy('created_at')->paginate(5);

            if($screenshots != []){
                return view('user_account.midias_td2', ['midias' => $midias]);
            } else {
                return view('user_account.midias_td2');
            }
        }
    }

    // Controlador para autenticar o usuário.
    public function autenticar(Request $request){

        $session_id = session_id();
        $executed = RateLimiter::attempt(
            'send-message:'.$session_id,
            $perMinute = 10,
            function() {
                // Número limite de requisições atingida, aguarde...
            },
            $decayRate = 60,
        );
         
        if (! $executed) {
            return redirect()->route('useraccount.signin', ['erro' => "Too many requests"]);
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

        $request->validate($regras, $feedback);

        $username = $request->get('user');
        $password = $request->get('password');
        
        $user = new Agentes();

        $conta = $user->where('username', '=' , $username)->get()->first();

        if(isset($conta->username)){

            if (Hash::check($password,$conta->password)) {
                $agentes_perfil = new AgentesPerfil();
                $perfil = $agentes_perfil->where('fk_id_agente', '=', $conta->id)->get()->first();
                if (isset($perfil->id)){
                    session_start();
                    $_SESSION['id'] = $conta->id;
                    $_SESSION['nome'] = $conta->nome_agente;
                    $_SESSION['is_adm'] = $conta->admin;
                    $_SESSION['id_foto_de_perfil'] = $perfil->fk_foto_perfil;
                    $_SESSION['patente'] = $perfil->patente;
                    $_SESSION['autenticado'] = true;
                    return redirect()->route('useraccount', ['name' => $_SESSION['nome']]);
                } else {
                    return redirect()->route('useraccount.signin', ['erro' => 'Erro de autenticação']);
                }
                
            } else{
                return redirect()->route('useraccount.signin', ['erro' => 'Usuário não encontrado']);
            }
        }
        else{
            return redirect()->route('useraccount.signin', ['erro' => 'Usuário não encontrado']);
        }
    }

    // Retorna a view de adicionar builds
    public function buildsTheDivision2Adicionar(Request $request, $name) {
        if ($name != $_SESSION['nome']){
            return redirect()->route('useraccount.builds.td2.adicionar', ['name' => $_SESSION['nome']]);
        }else {
            return view("user_account.builds_td2_adicionar");
        }
    }

    // Retorna a view de adicionar mídias
    public function midiaTheDivision2Adicionar(Request $request, $name) {

        if ($name != $_SESSION['nome']){
            return redirect()->route('useraccount.midia.td2.adicionar', ['name' => $_SESSION['nome']]);
        }else {
            return view("user_account.midias_td2_adicionar");
        }
    }

    // retorna a view de editar builds
    public function buildsTheDivision2Editar($name, $id){

        if ($name != $_SESSION['nome']){
            return redirect()->route('useraccount.builds.td2.editar', ['name' => $_SESSION['nome'], 'id' => $id]);
        }else {
            
            $builds = new Builds();
            $build = $builds->where('id', '=', $id)->where('fk_id_agente', '=', $_SESSION['id'])->get()->first();
            if (isset($build)){
                return view('user_account.builds_td2_editar', ['build_id' => $build->id, 'found' => true]);
            } else {
                return view('user_account.builds_td2_editar', ['build_id' => $id, 'found' => false]);
            }
        }
    }
}
