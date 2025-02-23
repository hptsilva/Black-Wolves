<div id="build-gadget" class="build-gadget">
@php

use App\Models\Builds;

include 'C:\Users\humbe\OneDrive\Área de Trabalho\Projeto\Projeto-Laravel\resources\views\processo_planilha\ler_planilha.blade.php';

$caminho = 'C:\Users\humbe\OneDrive\Área de Trabalho\Projeto\Projeto-Laravel\public\planilhas\gadget\\';

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
