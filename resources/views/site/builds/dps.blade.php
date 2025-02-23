<div id="build-dps" class="build-dps">
@php

use App\Models\Builds;

//include '/home/karingorok/Documentos/Code/public_html/resources/views/processo_planilha/ler_planilha.blade.php';
//include 'D:\public_html\resources\views\processo_planilha\ler_planilha.blade.php';
include '/home/u554131440/public_html/resources/views/processo_planilha/ler_planilha.blade.php';
//include 'C:\Users\humbe\OneDrive\Área de Trabalho\public_html\resources\views\processo_planilha\ler_planilha.blade.php';
//include '/media/karingorok/E4D3-47B8/public_html/resources/views/processo_planilha/ler_planilha.blade.php';


$caminho = '/home/u554131440/public_html/public/planilhas/dps/';
//$caminho = 'C:\Users\humbe\OneDrive\Área de Trabalho\public_html\public\planilhas\dps\\';
//$caminho = 'D:\public_html\public\planilhas\dps\\';
//$caminho = '/home/karingorok/Documentos/Code/public_html/public/planilhas/dps/';
//$caminho = '/media/karingorok/E4D3-47B8/public_html/public/planilhas/dps/';

$instance = new LerPlanilha();
$build = new Builds();

$builds = $build->where('classe', '=', 'dps')->get();
foreach ($builds as $build_dps) {
    $code = $build_dps->code;
    try{
        $instance->lerArquivo($caminho.$code.'.ods', '/img/builds/'.$code.'.webp', $code);
    }catch(Exception $erro){
        //ignora
    }
}

@endphp
    
</div>
