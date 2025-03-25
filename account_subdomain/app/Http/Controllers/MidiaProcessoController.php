<?php

namespace App\Http\Controllers;

use App\Models\Screenshots;
use App\Models\Videos;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class MidiaProcessoController
{

    public function excluir(Request $request, $id){

        $regras = [
            'tipo-arquivo' => 'required',
        ];
        $feedback = [
            'tipo-arquivo' => 'Erro na exclusão de mídia.',
        ];

        $validator = Validator::make($request->all(), $regras, $feedback);

        if ($validator->fails()) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => "Erro na exclusão de mídia.",
            ], 400);
        }

        if ($request->get('tipo-arquivo') == 'arquivo mp4'){

            // pesquisa no banco de dados se a id do vídeo existe e quem solicitou a exclusão é o autor do vídeo.
            $video = Videos::where('id', '=', $id)->where('fk_id_agente', '=', $_SESSION['id'])->get()->first();
            if (isset($video)){
                $path = env('MIDIAS_VIDEO_PATH');
                $path_thumbnail =  $path . 'thumbnail\\';
                try{

                    // apagar o arquivo do servidor e de sua referência no banco de dados
                    unlink($path.$video->nome_arquivo);
                    unlink($path_thumbnail.$video->thumbnail);
                    $video->delete();
                    return response()->json([
                       'mensagem'  => "Mídia excluída com sucesso.",
                    ]);

                }catch(Exception $erro){

                    return response()->json([
                        'mensagem' => 'Houve um erro durante o processo de exclusão.',
                    ], 500);

                }
            }else {

                return response()->json([
                    'mensagem' => 'Mídia não encontrada.',
                ], 404);

            }

        } else if ($request->get('tipo-arquivo') == 'arquivo webp'){

            $screenshot = Screenshots::where('id', '=', $id)->where('fk_id_agente', '=', $_SESSION['id'])->get()->first();
            if(isset($screenshot)) {
                $path = env('MIDIAS_SCREENSHOT_PATH') ;
                try {

                    unlink($path.$screenshot->nome_arquivo);
                    $screenshot->delete();
                    return response()->json([
                        'sucesso' => true,
                        'mensagem' => "Mídia excluída.",
                    ], 200);

                } catch(Exception $erro){

                    return response()->json([
                        'sucesso' => false,
                        'mensagem' => "Houve um erro durante o precesso de exclusão.",
                    ], 500);

                }
            } else {

                return response()->json([
                    'sucesso' => false,
                    'mensagem' => "Mídia não encontrada.",
                ], 404);
                
            }

        } else {
            return response()->json([
                'sucesso' => false,
                'mensagem' => "Erro na exclusão de mídia.",
            ], 406);
        }
    }

    public function adicionarImagem(Request $request) {

        $arquivo = $request->file('imagem-midia');

        $regras = [
            'imagem-midia' => 'required|file|max:5048|mimes:webp'
        ];

        $feedback = [
            'imagem-midia.required' => 'Nenhum arquivo enviado.',
            'imagem-midia.max' => 'O arquivo deve ter no máximo 5MB.',
            'imagem-midia.file' => 'O dado enviado não é um arquivo.',
            'imagem-midia.mimes' => 'O arquivo deve ser do tipo .webp'
        ];

        $validator = Validator::make($request->all(), $regras, $feedback);

        if ($validator->fails()) {
            return response()->json([
                'sucesso' => false,
                'mensagem' => $validator->messages(),
            ], 400);
        }

        $chave_unica = bin2hex(random_bytes(16));

        try{
            $file = $request->file('imagem-midia');
            $extension = $arquivo->getClientOriginalExtension();
            $filename = $chave_unica.'.'.$extension;
            $path = env('MIDIAS_SCREENSHOT_PATH');
            $file->move($path, $filename);
            $screenshot = new Screenshots();
            $screenshot->nome_arquivo = $filename;
            $screenshot->fk_id_agente = $_SESSION['id'];
            $screenshot->titulo = "Sem título";
            $screenshot->save();
            return response()->json([
                'mensagem' => "Arquivo de imagem adicionado com sucesso",
            ], 200);
        } catch (Exception $erro){
            return response()->json([
                'sucesso' => false,
                'mensagem' => ['mensagem' => "Ocorreu um erro durante o processo."],
            ], 500);
        }
    }

    public function adicionarVideo(Request $request) {

        $arquivo_video = $request->file('video-midia');
        $titulo = $request->get('titulo-video-midia');
        $arquivo_thumbnail = $request->file('video-midia-thumbnail');

        $regras = [
            'video-midia' => 'required|file|max:250000|mimes:mp4',
            'titulo-video-midia' => 'required|max:50',
            'video-midia-thumbnail' => 'bail|required|max:2048|mimes:webp,jpg,png',
        ];

        $feedback = [
            'video-midia.required' => 'Nenhum arquivo enviado.',
            'video-midia.file' => 'O dado enviado não é um arquivo.',
            'video-midia.max' => 'O arquivo de vídeo deve ter no máximo 250 MB.',
            'video-midia.mimes' => 'O arquivo deve ser do tipo .mp4.',
            'titulo-video-midia.required' => 'O campo título não foi preenchido.',
            'titulo-video-midia.max' => "O título deve ter no máximo 50 caracteres.",
            'video-midia-thumbnail.required' => 'O campo thumbnail é obrigatório.',
            'video-midia-thumbnail.max' => 'A thumbnail deve ter no máximo 2MB.',
            'video-midia-thumbnail.mimes' => 'O arquivo da thumbnail deve ser do tipo .webp, .png ou .jpg.',

        ];
    
        $validator = Validator::make($request->all(), $regras, $feedback);

        if ($validator->fails()) {
            return response()->json([
                'mensagem' => $validator->messages(),
            ], 400);
        }

        $chave_unica = bin2hex(random_bytes(16));

        try{
            $file_video = $request->file('video-midia');
            $extension = $arquivo_video->getClientOriginalExtension();
            $filename_video = $chave_unica.'.'.$extension;
            $path = env('MIDIAS_VIDEO_PATH');
            $file_video->move($path, $filename_video);
            
            $file_thumbnail = $request->file('video-midia-thumbnail');
            $extension = $arquivo_thumbnail->getClientOriginalExtension();
            $filename_thumbnail = $chave_unica.'.'.$extension;
            $path = env('MIDIAS_VIDEO_PATH') . 'thumbnail\\';
            $file_thumbnail->move($path, $filename_thumbnail);

            $video = new Videos();
            $video->nome_arquivo = $filename_video;
            $video->fk_id_agente = $_SESSION['id'];
            $video->titulo = $titulo;
            $video->thumbnail = $filename_thumbnail;
            $video->save();
            return response()->json([
                'mensagem' => "Arquivo de vídeo adicionado com sucesso.",
            ], 200);
        } catch (Exception $erro){
            return response()->json([
                'mensagem' => ['mensagem' => 'Ocorreu um erro durante o processo.' . $erro],
            ], 500);
        }
    }

}