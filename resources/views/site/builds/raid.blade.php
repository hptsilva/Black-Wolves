<div id="build-raid" class="build-raid">
@php

use App\Models\Builds;

include base_path('resources/views/processo_planilha/ler_planilha.blade.php');

$caminho = public_path('planilhas/raid/');

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
