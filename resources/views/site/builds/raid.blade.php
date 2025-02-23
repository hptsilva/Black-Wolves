<div id="build-raid" class="build-raid">
@php

use App\Models\Builds;

//include '/home/karingorok/Documentos/Code/public_html/resources/views/processo_planilha/ler_planilha.blade.php';
//include 'D:\public_html\resources\views\processo_planilha\ler_planilha.blade.php';
include '/home/u554131440/public_html/resources/views/processo_planilha/ler_planilha.blade.php';
//include 'C:\Users\humbe\OneDrive\Área de Trabalho\public_html\resources\views\processo_planilha\ler_planilha.blade.php';
//include '/media/karingorok/E4D3-47B8/public_html/resources/views/processo_planilha/ler_planilha.blade.php';

//$caminho = 'D:\public_html\public\planilhas\raid\\';
//$caminho = '/home/karingorok/Documentos/Code/public_html/public/planilhas/raid/';
$caminho = '/home/u554131440/public_html/public/planilhas/raid/';
//$caminho = 'C:\Users\humbe\OneDrive\Área de Trabalho\public_html\public\planilhas\raid\\';
//$caminho = '/media/karingorok/E4D3-47B8/public_html/public/planilhas/raid/';

$instance = new LerPlanilha();
$build = new Builds();

$builds = $build->where('classe', '=', 'raid')->get();
foreach ($builds as $build_raid) {
    $code = $build_raid->code;
    try{
    $instance->lerArquivo($caminho.$code.'.ods', '/img/builds/'.$code.'.webp', $code);
    } catch(Exception $erro){
        //ignora
    }
}

@endphp
</div>
