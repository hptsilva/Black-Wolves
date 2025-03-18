<div id="build-dps" class="build-dps">
@php

use App\Models\Builds;

include base_path('resources/views/processo_planilha/ler_planilha.blade.php');

$caminho = public_path('planilhas/dps/');

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
