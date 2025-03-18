<div id="build-tank" class="build-tank">
@php

use App\Models\Builds;

include base_path('resources/views/processo_planilha/ler_planilha.blade.php');

$caminho = public_path('planilhas/tank/');

$instance = new LerPlanilha();
$build = new Builds();

$builds = $build->where('classe', '=', 'tank')->get();
foreach ($builds as $build_tank) {
    $code = $build_tank->code;
    try{
    $instance->lerArquivo($caminho.$code.'.ods', '/img/builds/'.$code.'.webp', $code);
    } catch(Exception $erro){
        //ignora
    }
}

@endphp

</div>
