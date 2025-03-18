<div id="build-gadget" class="build-gadget">
@php

use App\Models\Builds;

include base_path('resources/views/processo_planilha/ler_planilha.blade.php');

$caminho = public_path('planilhas/gadget/');

$instance = new LerPlanilha();
$build = new Builds();

$builds = $build->where('classe', '=', 'gadget')->get();
foreach ($builds as $build_gadget) {
    $code = $build_gadget->code;
    try{
    $instance->lerArquivo($caminho.$code.'.ods', '/img/builds/'.$code.'.webp', $code);
    } catch ( Exception $erro){
        //ignora
    }
}

@endphp

</div>
