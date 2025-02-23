<div id="build-raid" class="build-raid">
@php

use App\Models\Builds;

include 'C:\Users\humbe\OneDrive\Área de Trabalho\Projeto\Projeto-Laravel\resources\views\processo_planilha\ler_planilha.blade.php';

$caminho = 'C:\Users\humbe\OneDrive\Área de Trabalho\Projeto\Projeto-Laravel\public\planilhas\raid\\';

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
