<?php

namespace App\Http\Controllers;

use App\Models\Builds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Ods;
use Illuminate\Support\Facades\RateLimiter; 

class BuildsProcessoController extends Controller
{
    // Excluir build
    public function excluir (Request $request, $id){

        $id_agente = $_SESSION['id'];
        $builds = new Builds();
        $build = $builds->where('id', '=', $id)->where('fk_id_agente', '=', $id_agente)->get()->first();

        if(isset($build)){

            $caminho_planilha = "/home/u554131440/public_html/public/planilhas/$build->classe/$build->code.ods";
            $caminho_imagem = "/home/u554131440/public_html/public/img/builds/$build->code.webp";
            unlink($caminho_imagem);
            unlink($caminho_planilha);
            $build->delete();
            return response()->json([
                'sucesso' => true,
                'mensagem' => 'Build excluída com sucesso',
            ], 200);
        } else {
            return response()->json([
                'sucesso' => false,
                'mensagem' => 'Build não encontrada',
            ], 404);
        }
    }

    public function adicionar (Request $request, $name){

        /*
         * Lista de Erros :
           - Erro 20: O diretório de armazenamento do conteúdo não foi encontrado encontrado.
           - Erro 21: Não foi possível ser a planilha no diretorio referente ao tipo de build;
           - Erro 22: Não foi possível salvar a imagem no diretório referente ao tipo de build;
           - Erro 23: Não foi possível inserir os dados de identificação da build no banco;
           - Erro 24: Erro durante o processo da solicitação;
        */

        if ($name != $_SESSION['nome']){
            return response()->json([
                'sucesso' => false,
                'mensagem' => ['menssagem' => "Acesso proibido ao recurso solicitado."] ,
            ], 403);
        }

        //regras do formulário
        $regras = dicionarioRegras();
        //Mensagens de resposta
        $feedback = dicionarioFeedback();

        //Verificar opção selecionada em tipo de máscara
        $tipo_mascara = get_dicionario($request->get('tipo-mascara'));
        if ($tipo_mascara == 'Normal' || $tipo_mascara == 'Exótica' || $tipo_mascara == 'Nomeada' || $tipo_mascara == 'Improvisado' || $tipo_mascara == 'NULL'){
            $regras['valor2-atributo-mascara'] = 'required|numeric|min:0|';
            $feedback['valor2-atributo-mascara.required'] = 'O valor do segundo atributo da máscara é obrigatório.';
            $feedback['valor2-atributo-mascara.numeric'] = 'O valor do segundo atributo da máscara deve ser numérico.';
            $feedback['valor2-atributo-mascara.min'] = 'O valor do segundo atributo da máscara deve ser maior que 0.';
        }

        //Verificar opção selecionada em tipo de mochila
        $tipo_mochila =  get_dicionario($request->get('tipo-mochila'));
        if ($tipo_mochila == 'Normal' || $tipo_mochila == 'Exótica' || $tipo_mochila == 'Nomeada' || $tipo_mochila == 'Improvisado' || $tipo_mochila == 'NULL'){
            $regras['valor2-atributo-mochila'] = 'required|numeric|min:0';
            $feedback['valor2-atributo-mochila.required'] = 'O valor do segundo atributo da mochila é obrigatório';
            $feedback['valor2-atributo-mochila.numeric'] = 'O valor do segundo atributo da mochila deve ser numérico';
            $feedback['valor2-atributo-mochila.min'] = 'O valor do segundo atributo da mochila deve ser maior que 0';
        }

        //Verificar opção selecionada em tipo de colete
        $tipo_colete = get_dicionario($request->get('tipo-colete'));
        if ($tipo_colete == 'Normal' || $tipo_colete == 'Exótica' || $tipo_colete == 'Nomeada' || $tipo_colete == 'Improvisado' || $tipo_colete == 'NULL'){
            $feedback['valor2-atributo-colete.required'] = 'O valor do segundo atributo do colete é obrigatório.';
            $feedback['valor2-atributo-colete.numeric'] = 'O valor do segundo atributo do colete deve ser numérico.';
            $feedback['valor2-atributo-colete.min'] = 'O valor do segundo atributo do colete deve ser maior que 0.';
        }

        //Verificar opção selecionada em tipo de luva
        $tipo_luva = get_dicionario($request->get('tipo-luva'));
        if ($tipo_luva == 'Normal' || $tipo_luva == 'Exótica' || $tipo_luva == 'Nomeada' || $tipo_luva == 'Improvisado' || $tipo_luva == 'NULL'){
            $regras['valor2-atributo-luva'] = 'required|numeric|min:0|';
            $feedback['valor2-atributo-luva.required'] = 'O valor do segundo atributo da luva é obrigatório.';
            $feedback['valor2-atributo-luva.numeric'] = 'O valor do segundo atributo da luva deve ser numérico.';
            $feedback['valor2-atributo-luva.min'] = 'O valor do segundo atributo da luva deve ser maior que 0.';
            if ($tipo_luva == 'Improvisado'){
                $regras['valor-modificacao-luva'] = 'required|numeric|min:0';
                $feedback['valor-modificacao-luva.required'] = 'O valor da modificação da luva é obrigatório.';
                $feddback['valor-modificacao-luva.numeric'] = 'O valor da modificação da luva deve ser numérico.';
                $feddback['valor-modificacao-luva.min'] = 'O valor da modificação da luva deve ser maior que 0.';
            }
        }

        //Verificar opção selecionada em tipo de coldre
        $tipo_coldre = get_dicionario($request->get('tipo-coldre'));
        if ($tipo_coldre == 'Normal' || $tipo_coldre == 'Exótica' || $tipo_coldre == 'Nomeada' || $tipo_coldre == 'Improvisado' || $tipo_coldre == 'NULL'){
            $regras['valor2-atributo-coldre'] = 'required|numeric|min:0|';
            $feedback['valor2-atributo-coldre.required'] = 'O valor do segundo atributo do coldre é obrigatório.';
            $feedback['valor2-atributo-coldre.numeric'] = 'O valor do segundo atributo do coldre deve ser numérico.';
            $feedback['valor2-atributo-coldre.min'] = 'O valor do segungo atributo do coldre deve ser maior que 0.';
            if ($tipo_coldre == 'Improvisado'){
                $regras['valor-modificacao-coldre'] = 'required|numeric|min:0';
                $feedback['valor-modificacao-coldre.required'] = 'O campo valor da modificação do coldre é obrigatório.';
                $feddback['valor-modificacao-coldre.numeric'] = 'O valor da modificação do coldre deve ser numérico.';
                $feddback['valor-modificacao-coldre.min'] = 'O valor da modificação do coldre deve ser maior que 0.';
            }
        }

        //Verificar opção selecionada em tipo de joelheira
        $tipo_joelheira = get_dicionario($request->get('tipo-joelheira'));
        if ($tipo_joelheira == 'Normal' || $tipo_joelheira == 'Exótica' || $tipo_joelheira == 'Nomeada' || $tipo_joelheira == 'Improvisado' || $tipo_joelheira == 'NULL'){
            $regras['valor2-atributo-joelheira'] = 'required|numeric|min:0|';
            $feedback['valor2-atributo-joelheira.required'] = 'O valor do segundo atributo da joelheira é obrigatório.';
            $feedback['valor2-atributo-joelheira.numeric'] = 'O valor do segundo atributo da joelheira deve ser numérico.';
            $feedback['valor2-atributo-joelheira.min'] = 'O valor do segundo atributo da joelheira deve ser maior que 0.';
            if ($tipo_joelheira == 'Improvisado'){
                $regras['valor-modificacao-joelheira'] = 'required|numeric|min:0';
                $feedback['valor-modificacao-joelheira.required'] = 'O valor da modificação da joelheira é obrigatório.';
                $feddback['valor-modificacao-joelheira.numeric'] = 'O valor da modificação da joelheira deve ser numérico.';
                $feddback['valor-modificacao-joelheira.min'] = 'O valor da modificação da joelheira deve ser maior que 0.';
            }
        }

        $validator = Validator::make($request->all(), $regras, $feedback);

        if ($validator->fails()) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => $validator->messages(),
            ], 422);
        }

        try{
            # seleciona qual diretório deve ser armazenado a planilha
            # Altere o caminho do diretório para o servidor de hospedagem
            switch($request->get('classe-build')){
                case 'dps':
                    $diretorio = '/home/u554131440/public_html/public/planilhas/dps/';
                    //$diretorio = '/home/karingorok/Área de Trabalho/public_html/public/planilhas/dps/';
                    break;
                case 'tank':
                    $diretorio = '/home/u554131440/public_html/public/planilhas/tank/';
                    //$diretorio = '/home/karingorok/Área de Trabalho/public_html/public/planilhas/tank/';
                    break;
                case 'gadget':
                    $diretorio = '/home/u554131440/public_html/public/planilhas/gadget/';
                    //$diretorio = '/home/karingorok/Área de Trabalho/public_html/public/planilhas/gadget/';
                    break;
                case 'raid':
                    $diretorio = '/home/u554131440/public_html/public/planilhas/raid/';
                    //$diretorio = '/home/karingorok/Área de Trabalho/public_html/public/planilhas/raid/';
                    break;
                default:
                return response()->json([
                    'sucesso' => false,
                    'mensagem' => ['mensagem' => "Não foi possível salvar o conteúdo. Erro 20."],
                ], 404);
            }

            #Montar o escopo da planilha
            $spreadsheet = new Spreadsheet();
            $spreadsheet->getActiveSheet()->setCellValue('A1', 'Arma Primária');
            $spreadsheet->getActiveSheet()->setCellValue('A2', 'Atributo Central');
            $spreadsheet->getActiveSheet()->setCellValue('A3', 'Atributos');
            $spreadsheet->getActiveSheet()->setCellValue('A4', 'Talento');
            $spreadsheet->getActiveSheet()->setCellValue('A5', 'Tipo de Arma');
            $spreadsheet->getActiveSheet()->setCellValue('A7', 'Arma Secundária');
            $spreadsheet->getActiveSheet()->setCellValue('A8', 'Atributo Central');
            $spreadsheet->getActiveSheet()->setCellValue('A9', 'Atributos');
            $spreadsheet->getActiveSheet()->setCellValue('A10', 'Talento');
            $spreadsheet->getActiveSheet()->setCellValue('A11', 'Tipo de Arma');
            $spreadsheet->getActiveSheet()->setCellValue('A13', 'Especialização');
            $spreadsheet->getActiveSheet()->setCellValue('A15', 'Máscara');
            $spreadsheet->getActiveSheet()->setCellValue('A16', 'Atributo Central');
            $spreadsheet->getActiveSheet()->setCellValue('A17', 'Atributos');
            $spreadsheet->getActiveSheet()->setCellValue('A18', 'Modificação');
            $spreadsheet->getActiveSheet()->setCellValue('A19', 'Talento');
            $spreadsheet->getActiveSheet()->setCellValue('A20', 'Tipo de Item');
            $spreadsheet->getActiveSheet()->setCellValue('A22', 'Mochila');
            $spreadsheet->getActiveSheet()->setCellValue('A23', 'Atributo Central');
            $spreadsheet->getActiveSheet()->setCellValue('A24', 'Atributos');
            $spreadsheet->getActiveSheet()->setCellValue('A25', 'Modificação');
            $spreadsheet->getActiveSheet()->setCellValue('A26', 'Talento');
            $spreadsheet->getActiveSheet()->setCellValue('A27', 'Tipo de Item');
            $spreadsheet->getActiveSheet()->setCellValue('A29', 'Colete');
            $spreadsheet->getActiveSheet()->setCellValue('A30', 'Atributo Central');
            $spreadsheet->getActiveSheet()->setCellValue('A31', 'Atributos');
            $spreadsheet->getActiveSheet()->setCellValue('A32', 'Modificação');
            $spreadsheet->getActiveSheet()->setCellValue('A33', 'Talento');
            $spreadsheet->getActiveSheet()->setCellValue('A34', 'Tipo de Item');
            $spreadsheet->getActiveSheet()->setCellValue('A36', 'Luva');
            $spreadsheet->getActiveSheet()->setCellValue('A37', 'Atributo Central');
            $spreadsheet->getActiveSheet()->setCellValue('A38', 'Atributos');
            $spreadsheet->getActiveSheet()->setCellValue('A39', 'Modificação');
            $spreadsheet->getActiveSheet()->setCellValue('A40', 'Talento');
            $spreadsheet->getActiveSheet()->setCellValue('A41', 'Tipo de Item');
            $spreadsheet->getActiveSheet()->setCellValue('A43', 'Coldre');
            $spreadsheet->getActiveSheet()->setCellValue('A44', 'Atributo Central');
            $spreadsheet->getActiveSheet()->setCellValue('A45', 'Atributos');
            $spreadsheet->getActiveSheet()->setCellValue('A46', 'Modificação');
            $spreadsheet->getActiveSheet()->setCellValue('A47', 'Talento');
            $spreadsheet->getActiveSheet()->setCellValue('A48', 'Tipo de Item');
            $spreadsheet->getActiveSheet()->setCellValue('A50', 'Joelheira');
            $spreadsheet->getActiveSheet()->setCellValue('A51', 'Atributo Central');
            $spreadsheet->getActiveSheet()->setCellValue('A52', 'Atributos');
            $spreadsheet->getActiveSheet()->setCellValue('A53', 'Modificação');
            $spreadsheet->getActiveSheet()->setCellValue('A54', 'Talento');
            $spreadsheet->getActiveSheet()->setCellValue('A55', 'Tipo de Item');
            $spreadsheet->getActiveSheet()->setCellValue('A57', 'Habilidade 1');
            $spreadsheet->getActiveSheet()->setCellValue('A58', 'Habilidade 2');
            $spreadsheet->getActiveSheet()->setCellValue('A60', 'Arma Reserva');
            $spreadsheet->getActiveSheet()->setCellValue('A61', 'Atributo Central');
            $spreadsheet->getActiveSheet()->setCellValue('A62', 'Atributos');
            $spreadsheet->getActiveSheet()->setCellValue('A63', 'Talento');
            $spreadsheet->getActiveSheet()->setCellValue('A64', 'Tipo de Arma');
            $spreadsheet->getActiveSheet()->setCellValue('A66', 'Nome da Build');

            // Adicionar nome e especialização da build.
            $spreadsheet->getActiveSheet()->setCellValue('B66', $request->get('nome-build'));
            $spreadsheet->getActiveSheet()->setCellValue('B13', get_dicionario($request->get('especializacao-build')));

            // Adicionar campos para arma primária
            $spreadsheet->getActiveSheet()->setCellValue('B1', $request->get('nome-arma-primaria'));
            $spreadsheet->getActiveSheet()->setCellValue('B5', get_dicionario($request->get('tipo-arma-primaria')));
            $spreadsheet->getActiveSheet()->setCellValue('B2', get_dicionario($request->get('atributo1-central-arma-primaria')));
            $spreadsheet->getActiveSheet()->setCellValue('C2', $request->get('valor1-atributo-central-arma-primaria'));
            $spreadsheet->getActiveSheet()->setCellValue('D2', get_dicionario($request->get('atributo2-central-arma-primaria')));
            $spreadsheet->getActiveSheet()->setCellValue('E2', $request->get('valor2-atributo-central-arma-primaria'));
            $spreadsheet->getActiveSheet()->setCellValue('B3', get_dicionario($request->get('atributo-arma-primaria')));
            $spreadsheet->getActiveSheet()->setCellValue('C3', $request->get('valor-atributo-arma-primaria'));
            $spreadsheet->getActiveSheet()->setCellValue('B4', get_dicionario($request->get('talento-arma-primaria')));

            // Adicionar campos para arma secundária
            $spreadsheet->getActiveSheet()->setCellValue('B7', $request->get('nome-arma-secundaria'));
            $spreadsheet->getActiveSheet()->setCellValue('B11', get_dicionario($request->get('tipo-arma-secundaria')));
            $spreadsheet->getActiveSheet()->setCellValue('B8', get_dicionario($request->get('atributo1-central-arma-secundaria')));
            $spreadsheet->getActiveSheet()->setCellValue('C8', $request->get('valor1-atributo-central-arma-secundaria'));
            $spreadsheet->getActiveSheet()->setCellValue('D8', get_dicionario($request->get('atributo2-central-arma-secundaria')));
            $spreadsheet->getActiveSheet()->setCellValue('E8', $request->get('valor2-atributo-central-arma-secundaria'));
            $spreadsheet->getActiveSheet()->setCellValue('B9', get_dicionario($request->get('atributo-arma-secundaria')));
            $spreadsheet->getActiveSheet()->setCellValue('C9', $request->get('valor-atributo-arma-secundaria'));
            $spreadsheet->getActiveSheet()->setCellValue('B10', get_dicionario($request->get('talento-arma-secundaria')));

            // Adicionar campos para a arma secundária
            $spreadsheet->getActiveSheet()->setCellValue('B60', $request->get('nome-arma-reserva'));
            $spreadsheet->getActiveSheet()->setCellValue('B64', get_dicionario($request->get('tipo-arma-reserva')));
            $spreadsheet->getActiveSheet()->setCellValue('B61', get_dicionario($request->get('atributo-central-arma-reserva')));
            $spreadsheet->getActiveSheet()->setCellValue('C61', $request->get('valor-atributo-central-arma-reserva'));
            $spreadsheet->getActiveSheet()->setCellValue('B62', get_dicionario($request->get('atributo-arma-reserva')));
            $spreadsheet->getActiveSheet()->setCellValue('C62', $request->get('valor-atributo-arma-reserva'));
            $spreadsheet->getActiveSheet()->setCellValue('B63', get_dicionario($request->get('talento-arma-reserva')));

            // Adiciona campos para o item: Máscara
            $spreadsheet->getActiveSheet()->setCellValue('B15', $request->get('nome-mascara'));
            $spreadsheet->getActiveSheet()->setCellValue('B16', get_dicionario($request->get('atributo-central-mascara')));
            $spreadsheet->getActiveSheet()->setCellValue('C16', $request->get('valor-atributo-central-mascara'));
            $spreadsheet->getActiveSheet()->setCellValue('B17', get_dicionario($request->get('atributo1-mascara')));
            $spreadsheet->getActiveSheet()->setCellValue('C17', $request->get('valor1-atributo-mascara'));
            $spreadsheet->getActiveSheet()->setCellValue('B20', $tipo_mascara);
            if ($tipo_mascara == 'Normal' || $tipo_mascara == 'Exótica' || $tipo_mascara == 'Nomeada' || $tipo_mascara == 'Improvisado' || $tipo_mascara == 'NULL'){
                $spreadsheet->getActiveSheet()->setCellValue('D17', get_dicionario($request->get('atributo2-mascara')));
                $spreadsheet->getActiveSheet()->setCellValue('E17', $request->get('valor2-atributo-mascara'));
            }
            $spreadsheet->getActiveSheet()->setCellValue('B18', get_dicionario($request->get('modificacao-mascara')));
            $spreadsheet->getActiveSheet()->setCellValue('C18', $request->get('valor-modificacao-mascara'));

            // Adiciona campos para o item: Mochila
            $spreadsheet->getActiveSheet()->setCellValue('B22', $request->get('nome-mochila'));
            $spreadsheet->getActiveSheet()->setCellValue('B23', get_dicionario($request->get('atributo1-central-mochila')));
            $spreadsheet->getActiveSheet()->setCellValue('C23', $request->get('valor1-atributo-central-mochila'));
            $spreadsheet->getActiveSheet()->setCellValue('B24', get_dicionario($request->get('atributo1-mochila')));
            $spreadsheet->getActiveSheet()->setCellValue('C24', $request->get('valor1-atributo-mochila'));
            if ($tipo_mochila == 'Normal' || $tipo_mochila == 'Exótica' || $tipo_mochila == 'Nomeada' || $tipo_mochila == 'Improvisado' || $tipo_mochila == 'NULL'){
                $spreadsheet->getActiveSheet()->setCellValue('D24', get_dicionario($request->get('atributo2-mochila')));
                $spreadsheet->getActiveSheet()->setCellValue('E24', $request->get('valor2-atributo-mochila'));
            }
            $spreadsheet->getActiveSheet()->setCellValue('B25', get_dicionario($request->get('modificacao-mochila')));
            $spreadsheet->getActiveSheet()->setCellValue('C25', $request->get('valor-modificacao-mochila'));
            if( $tipo_mochila == 'Normal' || $tipo_mochila == 'Improvisado'){
                $spreadsheet->getActiveSheet()->setCellValue('B26', get_dicionario($request->get('talento-mochila')));
            }
            $spreadsheet->getActiveSheet()->setCellValue('B27', $tipo_mochila);


            // Adiciona campos para o item: Colete
            $spreadsheet->getActiveSheet()->setCellValue('B29', $request->get('nome-colete'));
            $spreadsheet->getActiveSheet()->setCellValue('B30', get_dicionario($request->get('atributo-central-colete')));
            $spreadsheet->getActiveSheet()->setCellValue('C30', $request->get('valor-atributo-central-colete'));
            $spreadsheet->getActiveSheet()->setCellValue('B31', get_dicionario($request->get('atributo1-colete')));
            $spreadsheet->getActiveSheet()->setCellValue('C31', $request->get('valor1-atributo-colete'));
            $spreadsheet->getActiveSheet()->setCellValue('B34', $tipo_colete);
            if ($tipo_colete == 'Normal' || $tipo_colete == 'Exótica' || $tipo_colete == 'Nomeada' || $tipo_colete == 'Improvisado' || $tipo_colete == 'NULL'){
                $spreadsheet->getActiveSheet()->setCellValue('D31', get_dicionario($request->get('atributo2-colete')));
                $spreadsheet->getActiveSheet()->setCellValue('E31', $request->get('valor2-atributo-colete'));
            }
            $spreadsheet->getActiveSheet()->setCellValue('B32', get_dicionario($request->get('modificacao-colete')));
            $spreadsheet->getActiveSheet()->setCellValue('C32', $request->get('valor-modificacao-colete'));
            if ($tipo_colete == 'Normal') {
                $spreadsheet->getActiveSheet()->setCellValue('B33', get_dicionario($request->get('talento-colete')));
            }

            // Adiconar campos para o item: Luva
            $spreadsheet->getActiveSheet()->setCellValue('B36', $request->get('nome-luva'));
            $spreadsheet->getActiveSheet()->setCellValue('B37', get_dicionario($request->get('atributo-central-luva')));
            $spreadsheet->getActiveSheet()->setCellValue('C37', $request->get('valor-atributo-central-luva'));
            $spreadsheet->getActiveSheet()->setCellValue('B38', get_dicionario($request->get('atributo1-luva')));
            $spreadsheet->getActiveSheet()->setCellValue('C38', $request->get('valor1-atributo-luva'));
            $spreadsheet->getActiveSheet()->setCellValue('B41', $tipo_luva);
            if ($tipo_luva == 'Normal' || $tipo_luva == 'Exótica' || $tipo_luva == 'Nomeada' || $tipo_luva == 'Improvisado' || $tipo_luva == 'NULL'){
                $spreadsheet->getActiveSheet()->setCellValue('D38', get_dicionario($request->get('atributo2-luva')));
                $spreadsheet->getActiveSheet()->setCellValue('E38', $request->get('valor2-atributo-luva'));
                if($tipo_luva == 'Improvisado'){
                    $spreadsheet->getActiveSheet()->setCellValue('B39', get_dicionario($request->get('modificacao-luva')));
                    $spreadsheet->getActiveSheet()->setCellValue('C39', $request->get('valor-modificacao-luva'));
                }
            }

            // Adiconar campos para o item: Coldre
            $spreadsheet->getActiveSheet()->setCellValue('B43', $request->get('nome-coldre'));
            $spreadsheet->getActiveSheet()->setCellValue('B44', get_dicionario($request->get('atributo-central-coldre')));
            $spreadsheet->getActiveSheet()->setCellValue('C44', $request->get('valor-atributo-central-coldre'));
            $spreadsheet->getActiveSheet()->setCellValue('B45', get_dicionario($request->get('atributo1-coldre')));
            $spreadsheet->getActiveSheet()->setCellValue('C45', $request->get('valor1-atributo-coldre'));
            $spreadsheet->getActiveSheet()->setCellValue('B48', $tipo_coldre);
            if ($tipo_coldre == 'Normal' || $tipo_coldre == 'Exótica' || $tipo_coldre == 'Nomeada' || $tipo_coldre == 'Improvisado' || $tipo_coldre == 'NULL'){
                $spreadsheet->getActiveSheet()->setCellValue('D45', get_dicionario($request->get('atributo2-coldre')));
                $spreadsheet->getActiveSheet()->setCellValue('E45', $request->get('valor2-atributo-coldre'));
                if($tipo_coldre == 'Improvisado'){
                    $spreadsheet->getActiveSheet()->setCellValue('B46', get_dicionario($request->get('modificacao-coldre')));
                    $spreadsheet->getActiveSheet()->setCellValue('C46', $request->get('valor-modificacao-coldre'));
                }
            }

            // Adicionar campos para o item: Joelheira
            $spreadsheet->getActiveSheet()->setCellValue('B50', $request->get('nome-joelheira'));
            $spreadsheet->getActiveSheet()->setCellValue('B51', get_dicionario($request->get('atributo-central-joelheira')));
            $spreadsheet->getActiveSheet()->setCellValue('C51', $request->get('valor-atributo-central-joelheira'));
            $spreadsheet->getActiveSheet()->setCellValue('B52', get_dicionario($request->get('atributo1-joelheira')));
            $spreadsheet->getActiveSheet()->setCellValue('C52', $request->get('valor1-atributo-joelheira'));
            $spreadsheet->getActiveSheet()->setCellValue('B55', $tipo_joelheira);
            if ($tipo_joelheira == 'Normal' || $tipo_joelheira == 'Exótica' || $tipo_joelheira == 'Nomeada' || $tipo_joelheira == 'Improvisado' || $tipo_joelheira == 'NULL'){
                $spreadsheet->getActiveSheet()->setCellValue('D52', get_dicionario($request->get('atributo2-joelheira')));
                $spreadsheet->getActiveSheet()->setCellValue('E52', $request->get('valor2-atributo-joelheira'));
                if($tipo_joelheira == 'Improvisado'){
                    $spreadsheet->getActiveSheet()->setCellValue('B53', get_dicionario($request->get('modificacao-joelheira')));
                    $spreadsheet->getActiveSheet()->setCellValue('C53', $request->get('valor-modificacao-joelheira'));
                }
            }

            // Adicionar campos para o item: Habilidades
            $spreadsheet->getActiveSheet()->setCellValue('B57', get_dicionario($request->get('habilidade1')));
            $spreadsheet->getActiveSheet()->setCellValue('B58', get_dicionario($request->get('habilidade2')));

            // Gera a chave que será o nome da planilha e da imagem
            $chave_unica = bin2hex(random_bytes(16));

            // Salva o arquivo no diretorio referente ao tipo de build
            try{
                $arquivo = $chave_unica.'.ods';
                $writer = new Ods($spreadsheet);
                $writer->save($diretorio.$arquivo);
            } catch (Exception $erro){
                // Caso não consiga salvar o arquivo, retornará mensagem de erro
                return response()->json([
                    'sucesso' => false,
                    'mensagem' => ['mensagem' => "Não foi possível salvar o conteúdo. Erro 21."],
                ], 500);
            }

            // Salva a imagem no diretorio referente ao tipo de build
            try{
                $file = $request->file('imagem-build');
                $extension = $file->getClientOriginalExtension();
                $filename = $chave_unica.'.'.$extension;
                $path = "/home/u554131440/public_html/public/img/builds";
                //$path = "/home/karingorok/Área de Trabalho/public_html/public/img/builds";
                $file->move($path, $filename);
            } catch (Exception $erro){
                unlink($diretorio.$arquivo); //apagará a planilha no caso de erro
                return response()->json([
                    'sucesso' => false,
                    'mensagem' => ['mensagem' => "Não foi possível salvar o conteúdo. Erro 22."],
                ], 500);
            }

            // Inseri dados de identificação da build na base de dados
            try {
                $build = new Builds();
                $build->code = $chave_unica;
                $build->fk_id_agente = $_SESSION['id'];
                $build->nome_build = $request->get('nome-build');
                $build->classe = $request->get('classe-build');
                $build->save();
            } catch (Exception $erro){
                unlink($diretorio.$arquivo); //apagará a planilha no caso de erro
                //unlink('/media/karingorok/DISPOSITIVOS/account_subdomain/public/img/builds/'.$chave_unica.'.webp'); //apagará a imagem no caso de erro (Alterar diretório)
                unlink('/home/u554131440/public_html/public/img/builds/'.$chave_unica.'.webp'); //apagará a imagem no caso de erro (Alterar diretório)
                return response()->json([
                    'sucesso' => false,
                    'mensagem' => ['mensagem' => "Não foi possível salvar o conteúdo. Erro 23."],
                ], 500);
            }
            // Se todo processo deu certo, retorna mensagem de build adicionada com sucesso
            return response()->json([
                'sucesso' => true,
                'mensagem' => "Build adicionada com sucesso.",
            ], 200);
        }catch (Exception $erro){
            return response()->json([
                'sucesso' => false,
                'mensagem' => ['mensagem' => "Não foi possível salvar o conteúdo. Erro 24."],
            ], 500);
        }
    }

    public function preencher($id){
        
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
                'mensagem' =>  [ 'mensagem' => "Too Many Requests"],
            ], 429);
        }

        $builds = new Builds();
        $build = $builds->where('id', '=', $id)->where('fk_id_agente', '=', $_SESSION['id'])->get()->first();
        if(isset($build)){

            try{
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Ods();
                $classe = $build->classe;
                $arquivo = "/home/u554131440/public_html/public/planilhas/$classe/$build->code.ods";
                //$arquivo = "/home/karingorok/Área de Trabalho/public_html/public/planilhas/$classe/$build->code.ods";
                $spreadsheet = $reader->load($arquivo); 
                $worksheet = $spreadsheet->getActiveSheet();            

                // Array associativo com todos o valores possível para os atributos/tipos/especializacao de builds;
                $dicionario = dicionario();

                /* 
                Recupera todos os dados da planilha e envia a view via JSON. Utiliza o dicionario atribuir
                a chave corresponde ao valor obtido na planilha
                */

                // Identificação da build
                $nome_build = $worksheet->getCell('B66')->getValue();
                $imagem = "$build->code.webp";
                $especializacao = array_search($worksheet->getCell('B13')->getValue(), $dicionario);

                return response()->json([
                    'nome_build' => $nome_build,
                    'especializacao_build' => $especializacao,
                    'classe_build' => $classe,
                    'arma_primaria' => [
                        'nome_arma_primaria' => $worksheet->getCell('B1')->getValue(),
                        'atributo1_central_arma_primaria' => array_search($worksheet->getCell('B2')->getValue(), $dicionario),
                        'valor1_atributo_central_arma_primaria' => $worksheet->getCell('C2')->getValue(),
                        'atributo2_central_arma_primaria' => array_search($worksheet->getCell('D2')->getValue(), $dicionario),
                        'valor2_atributo_central_arma_primaria' => $worksheet->getCell('E2')->getValue(),
                        'atributo_arma_primaria' => array_search($worksheet->getCell('B3')->getValue(), $dicionario),
                        'valor_atributo_arma_primaria' => $worksheet->getCell('C3')->getValue(),
                        'talento_arma_primaria' => array_search($worksheet->getCell('B4')->getValue(), $dicionario),
                        'tipo_arma_primaria' => array_search($worksheet->getCell('B5')->getValue(), $dicionario),
                    ],
                    'arma_secundaria' => [
                        'nome_arma_secundaria' => $worksheet->getCell('B7')->getValue(),
                        'atributo1_central_arma_secundaria' => array_search($worksheet->getCell('B8')->getValue(), $dicionario),
                        'valor1_atributo_central_arma_secundaria' => $worksheet->getCell('C8')->getValue(),
                        'atributo2_central_arma_secundaria' => array_search($worksheet->getCell('D8')->getValue(), $dicionario),
                        'valor2_atributo_central_arma_secundaria' => $worksheet->getCell('E8')->getValue(),
                        'atributo_arma_secundaria' => array_search($worksheet->getCell('B9')->getValue(), $dicionario),
                        'valor_atributo_arma_secundaria' => $worksheet->getCell('C9')->getValue(),
                        'talento_arma_secundaria' => array_search($worksheet->getCell('B10')->getValue(), $dicionario),
                        'tipo_arma_secundaria' => array_search($worksheet->getCell('B11')->getValue(), $dicionario),
                    ],
                    'arma_reserva' => [
                        'nome_arma_reserva' => $worksheet->getCell('B60')->getValue(),
                        'atributo_central_arma_reserva' => array_search($worksheet->getCell('B61')->getValue(), $dicionario),
                        'valor_atributo_central_arma_reserva' => $worksheet->getCell('C61')->getValue(),
                        'atributo_arma_reserva' => array_search($worksheet->getCell('B62')->getValue(), $dicionario),
                        'valor_atributo_arma_reserva' => $worksheet->getCell('C62')->getValue(),
                        'talento_arma_reserva' => array_search($worksheet->getCell('B63')->getValue(), $dicionario),
                        'tipo_arma_reserva' => array_search($worksheet->getCell('B64')->getValue(), $dicionario),
                    ],
                    'mascara' => [
                        'nome_mascara' => $worksheet->getCell('B15')->getValue(),
                        'atributo_central_mascara' => array_search($worksheet->getCell('B16')->getValue(), $dicionario),
                        'valor_atributo_central_mascara' => $worksheet->getCell('C16')->getValue(),
                        'atributo1_mascara' => array_search($worksheet->getCell('B17')->getValue(), $dicionario),
                        'valor1_atributo_mascara' => $worksheet->getCell('C17')->getValue(),
                        'atributo2_mascara' => array_search($worksheet->getCell('D17')->getValue(), $dicionario),
                        'valor2_atributo_mascara' => $worksheet->getCell('E17')->getValue(),
                        'modificacao_mascara' => array_search($worksheet->getCell('B18')->getValue(), $dicionario),
                        'valor_modificacao_mascara' => $worksheet->getCell('C18')->getValue(),
                        'tipo_mascara' => array_search($worksheet->getCell('B20')->getValue(), $dicionario),
                    ],
                    'mochila' => [
                        'nome_mochila' => $worksheet->getCell('B22')->getValue(),
                        'atributo_central_mochila' => array_search($worksheet->getCell('B23')->getValue(), $dicionario),
                        'valor_atributo_central' => $worksheet->getCell('C23')->getValue(),
                        'atributo1_mochila' => array_search($worksheet->getCell('B24')->getValue(), $dicionario),
                        'valor1_atributo_mochila' => $worksheet->getCell('C24')->getValue(),
                        'atributo2_mochila' => array_search($worksheet->getCell('D24')->getValue(), $dicionario),
                        'valor2_atributo_mochila' => $worksheet->getCell('E24')->getValue(),
                        'modificacao_mochila' => array_search($worksheet->getCell('B25')->getValue(), $dicionario),
                        'valor_modificacao_mochila' => $worksheet->getCell('C25')->getValue(),
                        'talento_mochila' => array_search($worksheet->getCell('B26')->getValue(), $dicionario),
                        'tipo_mochila' => array_search($worksheet->getCell('B27')->getValue(), $dicionario),
                    ],
                    'colete' => [
                        'nome_colete' => $worksheet->getCell('B29')->getValue(),
                        'atributo_central_colete' => array_search($worksheet->getCell('B30')->getValue(), $dicionario),
                        'valor_atributo_central_colete' => $worksheet->getCell('C30')->getValue(),
                        'atributo1_colete' => array_search($worksheet->getCell('B31')->getValue(), $dicionario),
                        'valor1_atributo_colete' => $worksheet->getCell('C31')->getValue(),
                        'atributo2_colete' => array_search($worksheet->getCell('D31')->getValue(), $dicionario),
                        'valor2_atributo_colete' => $worksheet->getCell('E31')->getValue(),
                        'modificacao_colete' => array_search($worksheet->getCell('B32')->getValue(), $dicionario),
                        'valor_modificacao_colete' => $worksheet->getCell('C32')->getValue(),
                        'talento_colete' => array_search($worksheet->getCell('B33')->getValue(), $dicionario),
                        'tipo_colete' => array_search($worksheet->getCell('B34')->getValue(), $dicionario),
                    ],
                    'luva' => [
                        'nome_luva' => $worksheet->getCell('B36')->getValue(),
                        'atributo_central_luva' => array_search($worksheet->getCell('B37')->getValue(), $dicionario),
                        'valor_atributo_central_luva' => $worksheet->getCell('C37')->getValue(),
                        'atributo1_luva' => array_search($worksheet->getCell('B38')->getValue(), $dicionario),
                        'valor1_atributo_luva' => $worksheet->getCell('C38')->getValue(),
                        'atributo2_luva' => array_search($worksheet->getCell('D38')->getValue(), $dicionario),
                        'valor2_atributo_luva' => $worksheet->getCell('E38')->getValue(),
                        'modificacao_luva' => array_search($worksheet->getCell('B39')->getValue(), $dicionario),
                        'valor_modificacao_luva' => $worksheet->getCell('C39')->getValue(),
                        'talento_luva' => array_search($worksheet->getCell('B40')->getValue(), $dicionario),
                        'tipo_luva' => array_search($worksheet->getCell('B41')->getValue(), $dicionario),
                    ],
                    'coldre' => [
                        'nome_coldre' => $worksheet->getCell('B43')->getValue(),
                        'atributo_central_coldre' => array_search($worksheet->getCell('B44')->getValue(), $dicionario),
                        'valor_atributo_central_coldre' => $worksheet->getCell('C44')->getValue(),
                        'atributo1_coldre' => array_search($worksheet->getCell('B45')->getValue(), $dicionario),
                        'valor1_atributo_coldre' => $worksheet->getCell('C45')->getValue(),
                        'atributo2_coldre' => array_search($worksheet->getCell('D45')->getValue(), $dicionario),
                        'valor2_atributo_coldre' => $worksheet->getCell('E45')->getValue(),
                        'modificacao_coldre' => array_search($worksheet->getCell('B46')->getValue(), $dicionario),
                        'valor_modificacao_coldre' => $worksheet->getCell('C46')->getValue(),
                        'talento_coldre' => array_search($worksheet->getCell('B47')->getValue(), $dicionario),
                        'tipo_coldre' => array_search($worksheet->getCell('B48')->getValue(), $dicionario),
                    ],
                    'joelheira' => [
                        'nome_joelheira' => $worksheet->getCell('B50')->getValue(),
                        'atributo_central_joelheira' => array_search($worksheet->getCell('B51')->getValue(), $dicionario),
                        'valor_atributo_central_joelheira' => $worksheet->getCell('C51')->getValue(),
                        'atributo1_joelheira' => array_search($worksheet->getCell('B52')->getValue(), $dicionario),
                        'valor1_atributo_joelheira' => $worksheet->getCell('C52')->getValue(),
                        'atributo2_joelheira' => array_search($worksheet->getCell('D52')->getValue(), $dicionario),
                        'valor2_atributo_joelheira' => $worksheet->getCell('E52')->getValue(),
                        'modificacao_joelheira' => array_search($worksheet->getCell('B53')->getValue(), $dicionario),
                        'valor_modificacao_joelheira' => $worksheet->getCell('C53')->getValue(),
                        'talento_joelheira' => array_search($worksheet->getCell('B54')->getValue(), $dicionario),
                        'tipo_joelheira' => array_search($worksheet->getCell('B55')->getValue(), $dicionario),
                    ],
                    'habilidades' => [
                        'habilidade1' => array_search($worksheet->getCell('B57')->getValue(), $dicionario),
                        'habilidade2' => array_search($worksheet->getCell('B58')->getValue(), $dicionario),
                    ],
                ], 200);

            } catch (Exception $error){

                return response()->json([
                    'mensagem' => ['mensagem' => 'Erro ao carregar o recurso.'],
                ], 500);

            }
        }else{
            return response()->json([
                'mensagem' => ['mensagem' => 'Build não encontrada.'],
            ], 404);
        }

    }

    public function editar(Request $request, $id){

       /*
         * Lista de Erros :
           - Erro 20: O diretório de armazenamento do conteúdo não foi encontrado.
           - Erro 21: Não foi possível ser a planilha no diretorio referente ao tipo de build;
           - Erro 22: Não foi possível salvar a imagem no diretório referente ao tipo de build;
           - Erro 23: Não foi possível inserir os dados de identificação da build no banco;
           - Erro 24: Erro durante o processo da solicitação;
        */

        $builds = new Builds();
        $build = $builds->where('id', '=', $id)->where('fk_id_agente', '=', $_SESSION['id'])->get()->first();

        if(!isset($build)){
            return response()->json([
                'mensagem' => ['mensagem' => 'Resource Not Found'],
            ], 404);
        }

        //regras do formulário
        $regras = dicionarioRegras();
        $file = $request->file('imagem-build');
        if(!isset($file)){
            unset($regras['imagem-build']);
        }
        //Mensagens de resposta
        $feedback = dicionarioFeedback();

        //Verificar opção selecionada em tipo de máscara
        $tipo_mascara = get_dicionario($request->get('tipo-mascara'));
        if ($tipo_mascara == 'Normal' || $tipo_mascara == 'Exótica' || $tipo_mascara == 'Nomeada' || $tipo_mascara == 'Improvisado' || $tipo_mascara == 'NULL'){
            $regras['valor2-atributo-mascara'] = 'required|numeric|min:0|';
            $feedback['valor2-atributo-mascara.required'] = 'O valor do segundo atributo da máscara é obrigatório.';
            $feedback['valor2-atributo-mascara.numeric'] = 'O valor do segundo atributo da máscara deve ser numérico.';
            $feedback['valor2-atributo-mascara.min'] = 'O valor do segundo atributo da máscara deve ser maior que 0.';
        }

        //Verificar opção selecionada em tipo de mochila
        $tipo_mochila =  get_dicionario($request->get('tipo-mochila'));
        if ($tipo_mochila == 'Normal' || $tipo_mochila == 'Exótica' || $tipo_mochila == 'Nomeada' || $tipo_mochila == 'Improvisado' || $tipo_mochila == 'NULL'){
            $regras['valor2-atributo-mochila'] = 'required|numeric|min:0';
            $feedback['valor2-atributo-mochila.required'] = 'O valor do segundo atributo da mochila é obrigatório';
            $feedback['valor2-atributo-mochila.numeric'] = 'O valor do segundo atributo da mochila deve ser numérico';
            $feedback['valor2-atributo-mochila.min'] = 'O valor do segundo atributo da mochila deve ser maior que 0';
        }

        //Verificar opção selecionada em tipo de colete
        $tipo_colete = get_dicionario($request->get('tipo-colete'));
        if ($tipo_colete == 'Normal' || $tipo_colete == 'Exótica' || $tipo_colete == 'Nomeada' || $tipo_colete == 'Improvisado' || $tipo_colete == 'NULL'){
            $feedback['valor2-atributo-colete.required'] = 'O valor do segundo atributo do colete é obrigatório.';
            $feedback['valor2-atributo-colete.numeric'] = 'O valor do segundo atributo do colete deve ser numérico.';
            $feedback['valor2-atributo-colete.min'] = 'O valor do segundo atributo do colete deve ser maior que 0.';
        }

        //Verificar opção selecionada em tipo de luva
        $tipo_luva = get_dicionario($request->get('tipo-luva'));
        if ($tipo_luva == 'Normal' || $tipo_luva == 'Exótica' || $tipo_luva == 'Nomeada' || $tipo_luva == 'Improvisado' || $tipo_luva == 'NULL'){
            $regras['valor2-atributo-luva'] = 'required|numeric|min:0|';
            $feedback['valor2-atributo-luva.required'] = 'O valor do segundo atributo da luva é obrigatório.';
            $feedback['valor2-atributo-luva.numeric'] = 'O valor do segundo atributo da luva deve ser numérico.';
            $feedback['valor2-atributo-luva.min'] = 'O valor do segundo atributo da luva deve ser maior que 0.';
            if ($tipo_luva == 'Improvisado'){
                $regras['valor-modificacao-luva'] = 'required|numeric|min:0';
                $feedback['valor-modificacao-luva.required'] = 'O valor da modificação da luva é obrigatório.';
                $feedback['valor-modificacao-luva.numeric'] = 'O valor da modificação da luva deve ser numérico.';
                $feedback['valor-modificacao-luva.min'] = 'O valor da modificação da luva deve ser maior que 0.';
            }
        }

        //Verificar opção selecionada em tipo de coldre
        $tipo_coldre = get_dicionario($request->get('tipo-coldre'));
        if ($tipo_coldre == 'Normal' || $tipo_coldre == 'Exótica' || $tipo_coldre == 'Nomeada' || $tipo_coldre == 'Improvisado' || $tipo_coldre == 'NULL'){
            $regras['valor2-atributo-coldre'] = 'required|numeric|min:0|';
            $feedback['valor2-atributo-coldre.required'] = 'O valor do segundo atributo do coldre é obrigatório.';
            $feedback['valor2-atributo-coldre.numeric'] = 'O valor do segundo atributo do coldre deve ser numérico.';
            $feedback['valor2-atributo-coldre.min'] = 'O valor do segungo atributo do coldre deve ser maior que 0.';
            if ($tipo_coldre == 'Improvisado'){
                $regras['valor-modificacao-coldre'] = 'required|numeric|min:0';
                $feedback['valor-modificacao-coldre.required'] = 'O campo valor da modificação do coldre é obrigatório.';
                $feddback['valor-modificacao-coldre.numeric'] = 'O valor da modificação do coldre deve ser numérico.';
                $feddback['valor-modificacao-coldre.min'] = 'O valor da modificação do coldre deve ser maior que 0.';
            }
        }

        //Verificar opção selecionada em tipo de joelheira
        $tipo_joelheira = get_dicionario($request->get('tipo-joelheira'));
        if ($tipo_joelheira == 'Normal' || $tipo_joelheira == 'Exótica' || $tipo_joelheira == 'Nomeada' || $tipo_joelheira == 'Improvisado' || $tipo_joelheira == 'NULL'){
            $regras['valor2-atributo-joelheira'] = 'required|numeric|min:0|';
            $feedback['valor2-atributo-joelheira.required'] = 'O valor do segundo atributo da joelheira é obrigatório.';
            $feedback['valor2-atributo-joelheira.numeric'] = 'O valor do segundo atributo da joelheira deve ser numérico.';
            $feedback['valor2-atributo-joelheira.min'] = 'O valor do segundo atributo da joelheira deve ser maior que 0.';
            if ($tipo_joelheira == 'Improvisado'){
                $regras['valor-modificacao-joelheira'] = 'required|numeric|min:0';
                $feedback['valor-modificacao-joelheira.required'] = 'O valor da modificação da joelheira é obrigatório.';
                $feddback['valor-modificacao-joelheira.numeric'] = 'O valor da modificação da joelheira deve ser numérico.';
                $feddback['valor-modificacao-joelheira.min'] = 'O valor da modificação da joelheira deve ser maior que 0.';
            }
        }

        $validator = Validator::make($request->all(), $regras, $feedback);

        if ($validator->fails()) {
            return response()->json([
                'mensagem' => $validator->messages(),
            ], 422);
        }

        # seleciona qual diretório deve ser armazenado a planilha
        # Altere o caminho do diretório para o servidor de hospedagem
        switch($build->classe){
            case 'dps':
                $diretorio = '/home/u554131440/public_html/public/planilhas/dps/';
                //$diretorio = '/home/karingorok/Área de Trabalho/public_html/public/planilhas/dps/';
                break;
            case 'tank':
                $diretorio = '/home/u554131440/public_html/public/planilhas/tank/';
                //$diretorio = '/home/karingorok/Área de Trabalho/public_html/public/planilhas/tank/';
                break;
            case 'gadget':
                $diretorio = '/home/u554131440/public_html/public/planilhas/gadget/';
                //$diretorio = '/home/karingorok/Área de Trabalho/public_html/public/planilhas/gadget/';
                break;
            case 'raid':
                $diretorio = '/home/u554131440/public_html/public/planilhas/raid/';
                //$diretorio = '/home/karingorok/Área de Trabalho/public_html/public/planilhas/raid/';
                break;
            default:
                return response()->json([
                    'sucesso' => false,
                    'mensagem' => ['mensagem' => "Não foi possível salvar o conteúdo. Erro 20."],
                ], 404);
        }

        #Montar o escopo da planilha
        $arquivo = "$diretorio$build->code.ods";
        $spreadsheet = IOFactory::load($arquivo);

        // Adicionar nome e especialização da build.
        $spreadsheet->getActiveSheet()->setCellValue('B66', $request->get('nome-build'));
        $spreadsheet->getActiveSheet()->setCellValue('B13', get_dicionario($request->get('especializacao-build')));

        // Adicionar campos para arma primária
        $spreadsheet->getActiveSheet()->setCellValue('B1', $request->get('nome-arma-primaria'));
        $spreadsheet->getActiveSheet()->setCellValue('B5', get_dicionario($request->get('tipo-arma-primaria')));
        $spreadsheet->getActiveSheet()->setCellValue('B2', get_dicionario($request->get('atributo1-central-arma-primaria')));
        $spreadsheet->getActiveSheet()->setCellValue('C2', $request->get('valor1-atributo-central-arma-primaria'));
        $spreadsheet->getActiveSheet()->setCellValue('D2', get_dicionario($request->get('atributo2-central-arma-primaria')));
        $spreadsheet->getActiveSheet()->setCellValue('E2', $request->get('valor2-atributo-central-arma-primaria'));
        $spreadsheet->getActiveSheet()->setCellValue('B3', get_dicionario($request->get('atributo-arma-primaria')));
        $spreadsheet->getActiveSheet()->setCellValue('C3', $request->get('valor-atributo-arma-primaria'));
        $spreadsheet->getActiveSheet()->setCellValue('B4', get_dicionario($request->get('talento-arma-primaria')));

        // Adicionar campos para arma secundária
        $spreadsheet->getActiveSheet()->setCellValue('B7', $request->get('nome-arma-secundaria'));
        $spreadsheet->getActiveSheet()->setCellValue('B11', get_dicionario($request->get('tipo-arma-secundaria')));
        $spreadsheet->getActiveSheet()->setCellValue('B8', get_dicionario($request->get('atributo1-central-arma-secundaria')));
        $spreadsheet->getActiveSheet()->setCellValue('C8', $request->get('valor1-atributo-central-arma-secundaria'));
        $spreadsheet->getActiveSheet()->setCellValue('D8', get_dicionario($request->get('atributo2-central-arma-secundaria')));
        $spreadsheet->getActiveSheet()->setCellValue('E8', $request->get('valor2-atributo-central-arma-secundaria'));
        $spreadsheet->getActiveSheet()->setCellValue('B9', get_dicionario($request->get('atributo-arma-secundaria')));
        $spreadsheet->getActiveSheet()->setCellValue('C9', $request->get('valor-atributo-arma-secundaria'));
        $spreadsheet->getActiveSheet()->setCellValue('B10', get_dicionario($request->get('talento-arma-secundaria')));

        // Adicionar campos para a arma secundária
        $spreadsheet->getActiveSheet()->setCellValue('B60', $request->get('nome-arma-reserva'));
        $spreadsheet->getActiveSheet()->setCellValue('B64', get_dicionario($request->get('tipo-arma-reserva')));
        $spreadsheet->getActiveSheet()->setCellValue('B61', get_dicionario($request->get('atributo-central-arma-reserva')));
        $spreadsheet->getActiveSheet()->setCellValue('C61', $request->get('valor-atributo-central-arma-reserva'));
        $spreadsheet->getActiveSheet()->setCellValue('B62', get_dicionario($request->get('atributo-arma-reserva')));
        $spreadsheet->getActiveSheet()->setCellValue('C62', $request->get('valor-atributo-arma-reserva'));
        $spreadsheet->getActiveSheet()->setCellValue('B63', get_dicionario($request->get('talento-arma-reserva')));

        // Adiciona campos para o item: Máscara
        $spreadsheet->getActiveSheet()->setCellValue('B15', $request->get('nome-mascara'));
        $spreadsheet->getActiveSheet()->setCellValue('B16', get_dicionario($request->get('atributo-central-mascara')));
        $spreadsheet->getActiveSheet()->setCellValue('C16', $request->get('valor-atributo-central-mascara'));
        $spreadsheet->getActiveSheet()->setCellValue('B17', get_dicionario($request->get('atributo1-mascara')));
        $spreadsheet->getActiveSheet()->setCellValue('C17', $request->get('valor1-atributo-mascara'));
        $spreadsheet->getActiveSheet()->setCellValue('B20', $tipo_mascara);
        if ($tipo_mascara == 'Normal' || $tipo_mascara == 'Exótica' || $tipo_mascara == 'Nomeada' || $tipo_mascara == 'Improvisado' || $tipo_mascara == 'NULL'){
            $spreadsheet->getActiveSheet()->setCellValue('D17', get_dicionario($request->get('atributo2-mascara')));
            $spreadsheet->getActiveSheet()->setCellValue('E17', $request->get('valor2-atributo-mascara'));
        }
        $spreadsheet->getActiveSheet()->setCellValue('B18', get_dicionario($request->get('modificacao-mascara')));
        $spreadsheet->getActiveSheet()->setCellValue('C18', $request->get('valor-modificacao-mascara'));

        // Adiciona campos para o item: Mochila
        $spreadsheet->getActiveSheet()->setCellValue('B22', $request->get('nome-mochila'));
        $spreadsheet->getActiveSheet()->setCellValue('B23', get_dicionario($request->get('atributo1-central-mochila')));
        $spreadsheet->getActiveSheet()->setCellValue('C23', $request->get('valor1-atributo-central-mochila'));
        $spreadsheet->getActiveSheet()->setCellValue('B24', get_dicionario($request->get('atributo1-mochila')));
        $spreadsheet->getActiveSheet()->setCellValue('C24', $request->get('valor1-atributo-mochila'));
        if ($tipo_mochila == 'Normal' || $tipo_mochila == 'Exótica' || $tipo_mochila == 'Nomeada' || $tipo_mochila == 'Improvisado' || $tipo_mochila == 'NULL'){
            $spreadsheet->getActiveSheet()->setCellValue('D24', get_dicionario($request->get('atributo2-mochila')));
            $spreadsheet->getActiveSheet()->setCellValue('E24', $request->get('valor2-atributo-mochila'));
        }
        $spreadsheet->getActiveSheet()->setCellValue('B25', get_dicionario($request->get('modificacao-mochila')));
        $spreadsheet->getActiveSheet()->setCellValue('C25', $request->get('valor-modificacao-mochila'));
        if( $tipo_mochila == 'Normal' || $tipo_mochila == 'Improvisado'){
            $spreadsheet->getActiveSheet()->setCellValue('B26', get_dicionario($request->get('talento-mochila')));
        }
        $spreadsheet->getActiveSheet()->setCellValue('B27', $tipo_mochila);


        // Adiciona campos para o item: Colete
        $spreadsheet->getActiveSheet()->setCellValue('B29', $request->get('nome-colete'));
        $spreadsheet->getActiveSheet()->setCellValue('B30', get_dicionario($request->get('atributo-central-colete')));
        $spreadsheet->getActiveSheet()->setCellValue('C30', $request->get('valor-atributo-central-colete'));
        $spreadsheet->getActiveSheet()->setCellValue('B31', get_dicionario($request->get('atributo1-colete')));
        $spreadsheet->getActiveSheet()->setCellValue('C31', $request->get('valor1-atributo-colete'));
        $spreadsheet->getActiveSheet()->setCellValue('B34', $tipo_colete);
        if ($tipo_colete == 'Normal' || $tipo_colete == 'Exótica' || $tipo_colete == 'Nomeada' || $tipo_colete == 'Improvisado' || $tipo_colete == 'NULL'){
            $spreadsheet->getActiveSheet()->setCellValue('D31', get_dicionario($request->get('atributo2-colete')));
            $spreadsheet->getActiveSheet()->setCellValue('E31', $request->get('valor2-atributo-colete'));
        }
        $spreadsheet->getActiveSheet()->setCellValue('B32', get_dicionario($request->get('modificacao-colete')));
        $spreadsheet->getActiveSheet()->setCellValue('C32', $request->get('valor-modificacao-colete'));
        if ($tipo_colete == 'Normal') {
            $spreadsheet->getActiveSheet()->setCellValue('B33', get_dicionario($request->get('talento-colete')));
        }

        // Adiconar campos para o item: Luva
        $spreadsheet->getActiveSheet()->setCellValue('B36', $request->get('nome-luva'));
        $spreadsheet->getActiveSheet()->setCellValue('B37', get_dicionario($request->get('atributo-central-luva')));
        $spreadsheet->getActiveSheet()->setCellValue('C37', $request->get('valor-atributo-central-luva'));
        $spreadsheet->getActiveSheet()->setCellValue('B38', get_dicionario($request->get('atributo1-luva')));
        $spreadsheet->getActiveSheet()->setCellValue('C38', $request->get('valor1-atributo-luva'));
        $spreadsheet->getActiveSheet()->setCellValue('B41', $tipo_luva);
        if ($tipo_luva == 'Normal' || $tipo_luva == 'Exótica' || $tipo_luva == 'Nomeada' || $tipo_luva == 'Improvisado' || $tipo_luva == 'NULL'){
            $spreadsheet->getActiveSheet()->setCellValue('D38', get_dicionario($request->get('atributo2-luva')));
            $spreadsheet->getActiveSheet()->setCellValue('E38', $request->get('valor2-atributo-luva'));
            if($tipo_luva == 'Improvisado'){
                $spreadsheet->getActiveSheet()->setCellValue('B39', get_dicionario($request->get('modificacao-luva')));
                $spreadsheet->getActiveSheet()->setCellValue('C39', $request->get('valor-modificacao-luva'));
            }
        }

        // Adiconar campos para o item: Coldre
        $spreadsheet->getActiveSheet()->setCellValue('B43', $request->get('nome-coldre'));
        $spreadsheet->getActiveSheet()->setCellValue('B44', get_dicionario($request->get('atributo-central-coldre')));
        $spreadsheet->getActiveSheet()->setCellValue('C44', $request->get('valor-atributo-central-coldre'));
        $spreadsheet->getActiveSheet()->setCellValue('B45', get_dicionario($request->get('atributo1-coldre')));
        $spreadsheet->getActiveSheet()->setCellValue('C45', $request->get('valor1-atributo-coldre'));
        $spreadsheet->getActiveSheet()->setCellValue('B48', $tipo_coldre);
        if ($tipo_coldre == 'Normal' || $tipo_coldre == 'Exótica' || $tipo_coldre == 'Nomeada' || $tipo_coldre == 'Improvisado' || $tipo_coldre == 'NULL'){
            $spreadsheet->getActiveSheet()->setCellValue('D45', get_dicionario($request->get('atributo2-coldre')));
            $spreadsheet->getActiveSheet()->setCellValue('E45', $request->get('valor2-atributo-coldre'));
            if($tipo_coldre == 'Improvisado'){
                $spreadsheet->getActiveSheet()->setCellValue('B46', get_dicionario($request->get('modificacao-coldre')));
                $spreadsheet->getActiveSheet()->setCellValue('C46', $request->get('valor-modificacao-coldre'));
            }
        }

        // Adicionar campos para o item: Joelheira
        $spreadsheet->getActiveSheet()->setCellValue('B50', $request->get('nome-joelheira'));
        $spreadsheet->getActiveSheet()->setCellValue('B51', get_dicionario($request->get('atributo-central-joelheira')));
        $spreadsheet->getActiveSheet()->setCellValue('C51', $request->get('valor-atributo-central-joelheira'));
        $spreadsheet->getActiveSheet()->setCellValue('B52', get_dicionario($request->get('atributo1-joelheira')));
        $spreadsheet->getActiveSheet()->setCellValue('C52', $request->get('valor1-atributo-joelheira'));
        $spreadsheet->getActiveSheet()->setCellValue('B55', $tipo_joelheira);
        if ($tipo_joelheira == 'Normal' || $tipo_joelheira == 'Exótica' || $tipo_joelheira == 'Nomeada' || $tipo_joelheira == 'Improvisado' || $tipo_joelheira == 'NULL'){
            $spreadsheet->getActiveSheet()->setCellValue('D52', get_dicionario($request->get('atributo2-joelheira')));
            $spreadsheet->getActiveSheet()->setCellValue('E52', $request->get('valor2-atributo-joelheira'));
            if($tipo_joelheira == 'Improvisado'){
                $spreadsheet->getActiveSheet()->setCellValue('B53', get_dicionario($request->get('modificacao-joelheira')));
                $spreadsheet->getActiveSheet()->setCellValue('C53', $request->get('valor-modificacao-joelheira'));
            }
        }

        // Adicionar campos para o item: Habilidades
        $spreadsheet->getActiveSheet()->setCellValue('B57', get_dicionario($request->get('habilidade1')));
        $spreadsheet->getActiveSheet()->setCellValue('B58', get_dicionario($request->get('habilidade2')));

        $writer = new Ods($spreadsheet);
        $writer->save($arquivo);
        $nome_build = $request->get('nome-build');
        $classe = $request->get('classe-build');
        if ($classe != $build->classe){
            rename($arquivo, "/home/u554131440/public_html/public/planilhas/$classe/$build->code.ods");
            //rename($arquivo,"/home/karingorok/Área de Trabalho/public_html/public/planilhas/$classe/$build->code.ods");
        }
        $build->nome_build = $nome_build;
        $build->classe = $classe;
        $build->save();

        if (!isset($file)){
            return response()->json([
                'mensagem' => 'Build alterada com sucesso.',
            ], 200);
        }
        $path = "/home/u554131440/public_html/public/img/builds/";
        //$path = "/home/karingorok/Área de Trabalho/public_html/public/img/builds/";
        unlink("$path$build->code.webp");
        $extension = $file->getClientOriginalExtension();
        $filename = $build->code.'.'.$extension;
        $file->move($path, $filename);

        return response()->json([
            'mensagem' => 'Build alterada com sucesso.',
        ], 200);

    }
}