<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TokenAutenticacoes;
use Exception;
use App\Models\Agentes;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Gerencia as contas do site. Apenas adm podem acessar a página
    public function gerenciarContas(Request $request){
        $model = new TokenAutenticacoes();
        $contas = $model->where('id', '!=', 'be425dad-e00b-482f-93b0-3ef80f5000df')->orderByRaw('usuario')->paginate(3);
        return view('site.admin.gerenciar_contas',['contas' => $contas, 
                                            'sucesso' => $request->get('sucesso')]);
    }

        // Processa a solicitação para excluir ou resetar a conta
        public function processarContas(Request $request){

            $user = new Agentes();
            $tokenAutenticacao = new TokenAutenticacoes();
            // Excluir Conta
            if(isset($_POST['excluir'])){
                try{
                    // Procura a conta na base de dados e a deleta.
                    $user->where('nome_agente', '=', $request->get('codigo'))->delete();
                    $tokenAutenticacao->where('usuario', '=', $request->get('codigo'))->delete();
                    return redirect()->route('conta.adm.gerenciar', ['sucesso' => 'Conta excluída com sucesso']);
                } catch (Exception $erro){
                    $erro = 'Não foi possível excluir a conta';
                    return redirect()->route('conta.adm.gerenciar', ['erro' => $erro]);
                }
    
            // Reseta a conta
            }else if(isset($_POST['resetar'])){
                
                try{
                    // Reseta a conta colocando a senha como 00000000
                    $conta = $user->where('nome_agente', '=', $request->get('codigo'))->get()->first();
                    $conta->password = '00000000';
                    $conta->save();
                    return redirect()->route('conta.adm.gerenciar', ['sucesso' => 'Conta resetada com sucesso']);
                }catch (Exception $erro){
                    $erro = 'Não foi possível resetar a conta';
                    return redirect()->route('conta.adm.gerenciar', ['erro' => $erro]);
                }
            // Se não for nenhuma das opções, retorna para a página de gerenciar contas;
            } else {
                return view('site.admin.gerenciar_contas');
            }
        }
    
    public function adicionarConta(Request $request){
        
        $sucesso = $request->get('sucesso');
        $erro = $request->get('erro');
        if (isset($sucesso)){
            return view('site.admin.adicionar_conta', ['sucesso' => $request->get('sucesso')]);
        }
        return view('site.admin.adicionar_conta');
    }

    public function processarAdicionarConta(Request $request){
        
        $autenticacao = new TokenAutenticacoes();

        
        $regras = ['nome' => 'required'];
        $feedback = ['nome.required' => 'O campo nome do agente é obrigatório'];

        $request->validate($regras, $feedback);
        $token_uuid = Uuid::uuid4();
        $autenticacao->token_uuid = $token_uuid;
        $autenticacao->usuario = $request->get('nome');
        $autenticacao->usado = 'NÃO';
        $autenticacao->save();
        return redirect()->route('conta.adm.gerenciar.adicionar.usuario', ['sucesso' => 'Conta criada com sucesso']);
    }
}
