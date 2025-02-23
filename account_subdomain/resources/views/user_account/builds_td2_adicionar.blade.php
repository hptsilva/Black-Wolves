<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Adicionar Build | Black Wolves</title>
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/estilo_adicionar_build.css?v=6.5')}}">
        <meta name="robots" content="noindex">
    </head>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        function apagarMensagem(id){
            var id = document.getElementById(id);
            var mensagem = "";
            $(id).html(mensagem);
        }
    </script>
    <script>
        function funcaoTipoMascara(select, div1, div2) {var select = document.getElementById(select);document.getElementById(div1).style.display = "none";document.getElementById(div2).style.display = "none";if (select.value != 'verde'){document.getElementById(div1).style.display = "";document.getElementById(div2).style.display = "";}}
        function funcaoTipoLuva(select,div1, div2, div3, div4){var select = document.getElementById(select);if (select.value == 'verde'){document.getElementById(div1).style.display = "none";document.getElementById(div2).style.display = "none";document.getElementById(div3).style.display = "none";document.getElementById(div4).style.display = "none";} else {document.getElementById(div1).style.display = "";document.getElementById(div3).style.display = "";document.getElementById(div2).style.display = "none";document.getElementById(div4).style.display = "none";if (select.value == 'improvisado'){document.getElementById(div2).style.display = "";document.getElementById(div4).style.display = "";}}}
        function funcaoTipoColete(select, div1, div2, div3){var select = document.getElementById(select);if (select.value == 'verde'){document.getElementById(div1).style.display = "none";document.getElementById(div2).style.display = "none";document.getElementById(div3).style.display = "none";} else if (select.value == 'exotica' || select.value == 'nomeada') {document.getElementById(div1).style.display = "";document.getElementById(div2).style.display = "none";document.getElementById(div3).style.display = "";} else {document.getElementById(div1).style.display = "";document.getElementById(div2).style.display = "";document.getElementById(div3).style.display = "";}}
        function funcaoTipoColdre(select, div1, div2, div3, div4){var select = document.getElementById(select);if (select.value == 'verde'){document.getElementById(div1).style.display = "none";document.getElementById(div2).style.display = "none";document.getElementById(div3).style.display = "none";document.getElementById(div4).style.display = "none";} else if (select.value == 'exotica' || select.value == 'nomeada' || select.value == 'improvisado') {document.getElementById(div1).style.display = "";document.getElementById(div2).style.display = "none";document.getElementById(div3).style.display = "";document.getElementById(div4).style.display = "none";if (select.value == 'improvisado'){document.getElementById(div2).style.display = "";document.getElementById(div4).style.display = "";}} else {document.getElementById(div1).style.display = "";document.getElementById(div2).style.display = "none";document.getElementById(div3).style.display = "";}}
        function funcaoTipoJoelheira(select, div1, div2, div3, div4){var select = document.getElementById(select);document.getElementById(div2).style.display = "none";document.getElementById(div3).style.display = "";document.getElementById(div1).style.display = "";document.getElementById(div4).style.display = "none";if (select.value == 'verde'){document.getElementById(div1).style.display = "none";document.getElementById(div3).style.display = "none";document.getElementById(div4).style.display = "none";} else if (select.value == 'improvisado') {document.getElementById(div2).style.display = "block";document.getElementById(div4).style.display = "block";}}
        function funcaoTipoMochila(select){var select = document.getElementById(select);if (select.value == "verde"){var div = document.getElementById('atributo-mochila');div.style.display = "none";var div = document.getElementById('talento-mochila');div.style.display = "none";var div = document.getElementById('valor-atributo-mochila');div.style.display = "none";} else if (select.value == 'nomeada' || select.value == 'exotica') {var div = document.getElementById('talento-mochila');div.style.display = "none";var div = document.getElementById('atributo-mochila');div.style.display = "";var div = document.getElementById('valor-atributo-mochila');div.style.display = "";} else {var div = document.getElementById('atributo-mochila');div.style.display = "";var div = document.getElementById('talento-mochila');div.style.display = "";var div = document.getElementById('valor-atributo-mochila');div.style.display = "";}} 
    </script>
    <body>
        <?php
        if(isset($_SESSION['autenticado'])){?>
        <header id="topo">
            <div class="container-fluid" id="nav">
                <nav class="navbar navbar-expand-lg">
                    <a href="{{route('useraccount' , ['name' => $_SESSION['nome']])}}">
                        <img class="navbar-brand" src="{{asset('img/logo.png')}}" width="50">
                    </a>
                </nav>
            </div>
            <div class="perfil">
                <?php
                    $fotos_perfil = new App\Models\FotosPerfil();
                    $foto = $fotos_perfil->where('id', '=', $_SESSION['id_foto_de_perfil'])->get()->first();
                ?>
                <h6>
                    {{$_SESSION['nome']}}
                </h6>
                <div class="dropdown">
                    <span class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="{{asset('img/foto_perfil/'.$foto->nome_arquivo)}}" width="50"></span>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start">
                        <li class="dropdown-item">
                            <form method="POST" action="{{route('signout')}}">
                                @csrf
                                <button type="submit" class="sair">Sair</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <nav class="container mt-4">
            <a href="{{route('useraccount.builds.td2', ['name' => $_SESSION['nome']])}}">
                <button class="btn btn-primary">VOLTAR</button>
            </a>
        </nav>
        <main class="container">
            <div class="builds-content mt-3">
                <h1 class="mb-4">ADICIONAR BUILD | Tom Clancy's The Division 2</h1>
            </div>
            <strong>* Página em construção...</strong><br><br>
            <div id="mensagemFormAdicionarBuild">
            </div>
            <form id="adicionarBuildForm">
                @csrf
                <div class="builds row g-3">
                    <h5>Identificação:</h5>
                    <div class="col-md-4">
                        <label class="form-label" for="nomeBuild">Nome:</label>
                        <input class="form-control" name="nome-build" id="nomeBuild" placeholder="Nome da build" required>
                    </div>
                    <div class="col-md-4">
                        <label for="classeBuild" class="form-label">Classe:</label>
                        <select class="form-select" name="classe-build" id="classeBuild">
                            <option value="dps" select>Ofensivo</option>
                            <option value="tank">Defensivo</option>
                            <option value="gadget">Utilitário</option>
                            <option value='raid'>Raid</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="especializacaoBuild" class="form-label">Especialização:</label>
                        <select class="form-select" name="especializacao-build" id="especializacaoBuild">
                            <option value='artilheiro'>Artilheiro</option>
                            <option value='atirador-de-elite'>Atirador de elite</option>
                            <option value='demolidor'>Demolidor</option>
                            <option value='fogareu'>Fogaréu</option>
                            <option value='sobrevivencialista'>Sobrevivencialista</option>
                            <option value='tecnico'>Técnico</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="imagemBuild" class="form-label">Imagem (Formato .webp):</label>
                        <input id='imagemBuild' type="file" class="form-control" name="imagem-build" accept="image/webp" required>
                    </div>
                </div>

                <!-- Arma Primária -->

                <div class="builds row g-3">
                    <h5>Arma primária:</h5>
                    <div class="col-md-6">
                        <label class="form-label" for="nomeArmaPrimaria">Nome:</label>
                        <input class="form-control" name="nome-arma-primaria" placeholder="Nome da arma primária" id="nomeArmaPrimaria" required>
                    </div>
                    <div class="col-md-4">
                        <label for="tipoArmaPrimaria" class="form-label">Tipo:</label>
                        <select class="form-select" name="tipo-arma-primaria" id="tipoArmaPrimaria">
                            <option value='normal'>Normal</option>
                            <option value='exotica'>Exótica</option>
                            <option value='nomeada'>Nomeada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="atributoCentralArmaPrimaria" class="form-label">Atributo Central: </label>
                        <div class="mb-3">
                            <select class="form-select" name="atributo1-central-arma-primaria" id="atributoCentralArmaPrimaria">
                                @foreach (atributoCentral1() as $value => $label)
                                    <option value="{{ $value }}">
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <select class="form-control" name='atributo2-central-arma-primaria'>
                            @foreach (atributoCentral2() as $value => $label)
                                <option value="{{ $value }}">
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="valorAtributoCentralArmaPrimaria" class="form-label">Valor:</label>
                        <div class="mb-3">
                            <input class="form-control" name="valor1-atributo-central-arma-primaria" id="valorAtributoCentralArmaPrimaria" type="number" step=0.1 min=0 placeholder="Insira a valor" required>
                        </div>
                        <input class="form-control" name="valor2-atributo-central-arma-primaria" type="number" step=0.1 min=0 placeholder="Insira a valor" required>
                    </div>
                    <div class="col-md-6">
                        <label for="atributoArmaPrimaria" class="form-label">Atributo: </label>
                        <select class="form-select" name="atributo-arma-primaria" id="atributoArmaPrimaria">
                            @foreach (dicionarioAtributo() as $value => $label)
                                <option value="{{ $value }}">
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="valorAtributoArmaPrimaria" class="form-label">Valor:</label>
                        <input class="form-control" name="valor-atributo-arma-primaria" id="valorAtributoArmaPrimaria" type="number" step=0.1 min=0 placeholder="Insira a valor" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="talentoArmaPrimaria" class="form-label">Talento:</label>
                        <select class="form-select" name="talento-arma-primaria" id="talentoArmaPrimaria">
                            @foreach (dicionarioTalento() as $value => $label)
                                <option value="{{ $value }}">
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

            <!-- Arma secundária -->

                <div class="builds row g-3">
                    <h5>Arma secundária:</h5>
                    <div class="col-md-6">
                        <label for="nomeArmaSecundaria" class="form-label">Nome</label>
                        <input class="form-control" name="nome-arma-secundaria" id="nomeArmaSecundaria" placeholder="Nome da arma secundária" required>
                    </div>
                    <div class="col-md-4">
                        <label for="tipoArmaSecundaria" class="form-label">Tipo:</label>
                        <select class="form-select" id="tipoArmaSecundaria" name="tipo-arma-secundaria">
                            <option value='normal'>Normal</option>
                            <option value='exotica'>Exótica</option>
                            <option value='nomeada'>Nomeada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="atributoCentralArmaSecundaria" class="form-label">Atributo Central: </label>
                        <div class="mb-3">
                            <select class="form-select" name="atributo1-central-arma-secundaria" id="atributoCentralArmaSecundaria">
                                @foreach (atributoCentral1() as $value => $label)
                                    <option value="{{ $value }}">
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <select class="form-select" name="atributo2-central-arma-secundaria">
                            @foreach (atributoCentral2() as $value => $label)
                                <option value="{{ $value }}">
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="valorAtributoCentralArmaSecundaria" class="form-label">Valor:</label>
                        <div class="mb-3">
                            <input class="form-control" id="valorAtributoCentralArmaSecundaria" name="valor1-atributo-central-arma-secundaria" type="number" step=0.1 min=0 placeholder="Insira a valor" required>
                        </div>
                        <input class="form-control" name="valor2-atributo-central-arma-secundaria" type="number" step=0.1 min=0 placeholder="Insira a valor" required>
                    </div>
                    <div class="col-md-6">
                        <label for="atributoArmaSecundaria" class="form-label">Atributo:</label>
                        <select class="form-select" name="atributo-arma-secundaria" id="atributoArmaSecundaria">
                            @foreach (dicionarioAtributo() as $value => $label)
                                <option value="{{ $value }}">
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="valorAtributoArmaSecundaria" class="form-label">Valor:</label>
                        <input class="form-control" name="valor-atributo-arma-secundaria" id="valorAtributoArmaSecundaria" type="number" step=0.1 min=0 placeholder="Insira a valor" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="talentoArmaSecundaria" class="form-label">Talento:</label>
                        <select class="form-select" name="talento-arma-secundaria" id="talentoArmaSecundaria">
                            @foreach (dicionarioTalento() as $value => $label)
                                <option value="{{ $value }}">
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Arma Reserva -->
                <div class="builds row g-3">
                    <h5>Arma Reserva:</h5>
                    <div class="col-md-6">
                        <label for="nomeArmaReserva" class="form-label">Nome:</label>
                        <input class="form-control" name="nome-arma-reserva" id="nomeArmaReserva" placeholder="Nome da arma reserva" required>
                    </div>
                    <div class="col-md-4">
                        <label for="tipoArmaReserva" class="form-label">Tipo:</label>
                        <select class="form-select" name="tipo-arma-reserva" id="tipoArmaReserva">
                            <option value='normal'>Normal</option>
                            <option value='exotica'>Exótica</option>
                            <option value='nomeada'>Nomeada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="atributoCentralArmaReserva" class="form-label">Atributo Central:</label>
                        <select class="form-select" name="atributo-central-arma-reserva" id="atributoCentralArmaReserva">
                            @foreach (atributoCentral1() as $value => $label)
                                <option value="{{ $value }}">
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="valorAtributoCentralArmaReserva" class="form-label">Valor:</label>
                        <input class="form-control" name="valor-atributo-central-arma-reserva" id="valorAtributoCentralArmaReserva" type="number" step=0.1 min=0  placeholder="Insira a valor" required>
                    </div>
                    <div class="col-md-6">
                        <label for="atributoArmaReserva" class="form-label">Atributo:</label>
                        <select class="form-select" name="atributo-arma-reserva" id="atributoArmaReserva">
                            @foreach (dicionarioAtributo() as $value => $label)
                                <option value="{{ $value }}">
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="valorAtributoArmaReserva" class="form-label">Valor</label>
                        <input class="form-control" name="valor-atributo-arma-reserva" id="valorAtributoArmaReserva" type="number" step=0.1 min=0 placeholder="Insira a valor" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="talentoArmaReserva" class="form-label">Talento:</label>
                        <select class="form-select" name='talento-arma-reserva' id="talentoArmaReserva">
                            @foreach (dicionarioTalento() as $value => $label)
                                <option value="{{ $value }}">
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Máscara -->

                <div class="builds row g-3">
                    <h5>Máscara:</h5>
                    <div class="col-md-6">
                        <label for="nomeMascara" class="form-label">Nome</label>
                        <input class="form-control" name="nome-mascara" id="nomeMascara" placeholder="Nome da máscara" required>
                    </div>
                    <div class="col-md-4">
                        <label for="tipo-mascara" class="form-label">Tipo:</label>
                        <select class="form-select" name="tipo-mascara" id="tipo-mascara" onchange="funcaoTipoMascara(id,'atributo-mascara', 'valor-atributo-mascara')">
                            <option value='normal'>Normal</option>
                            <option value='exotica'>Exótica</option>
                            <option value='nomeada'>Nomeada</option>
                            <option value='verde'>Gear Set (Verde)</option>
                            <option value='improvisado'>Improvisado</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="atributoCentralMascara" class="form-label">Atributo Central: </label>
                        <select class="form-select" name="atributo-central-mascara" id="atributoCentralMascara">
                            <option value='dano'>Dano de arma (%)</option>
                            <option value='protecao'>Proteção balística</option>
                            <option value='tier'>Tier de Habilidade</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="valorAtributoCentralMascara" class="form-label">Valor:</label>
                        <input class="form-control" name="valor-atributo-central-mascara" id="valorAtributoCentralMascara" type="number" step=0.1 min=0 placeholder="Insira o valor" required>
                    </div>
                    <div class="col-md-6">
                        <label for="atributo1Mascara" class="form-label">Atributo:</label>
                        <div class="mb-3">
                            <select class="form-select" name="atributo1-mascara" id="atributo1Mascara">
                                @foreach (dicionarioAtributo() as $value => $label)
                                    <option value="{{ $value }}">
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div id="atributo-mascara">
                            <select class="form-select" name='atributo2-mascara' id='select-atributo-mascara-2'>
                                @foreach (dicionarioAtributo() as $value => $label)
                                <option value="{{ $value }}">
                                    {{ $label }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="valorAtributoMascara" class="form-label">Valor:</label>
                        <div class="mb-3">
                            <input class="form-control" id="valorAtributoMascara" name="valor1-atributo-mascara" type="number" min="0" step="0.1" placeholder="Insira o valor">
                        </div>
                        <div id="valor-atributo-mascara">
                            <input class="form-control" name="valor2-atributo-mascara" id='input-atributo-mascara-2' type="number" min=0 step="0.1" placeholder="Insira o valor">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="modificacaoMascara" class="form-label">Modificação:</label>
                        <select class="form-control" name="modificacao-mascara" id="modificacaoMascara">
                            @foreach (dicionarioModificacao() as $value => $label)
                                <option value="{{ $value }}">
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="valorModificacaoMascara" class="form-label">Valor:</label>
                        <input class="form-control" name="valor-modificacao-mascara" id="valorModificacaoMascara" type="number" min=0 step="0.1" placeholder="Insira o valor">
                    </div>
                </div>

                <!-- Mochila -->

                <div class="builds row g-3">
                    <h5>Mochila:</h5>
                    <div class="col-md-6">
                        <label for="nomeMochila" class="form-label">Nome:</label>
                        <input class="form-control" name="nome-mochila" id="nomeMochila" placeholder="Nome da mochila" required>
                    </div>
                    <div class="col-md-4">
                        <label for="tipo-mochila" class="form-label">Tipo:</label>
                        <select class="form-select" name='tipo-mochila' id="tipo-mochila" onchange="funcaoTipoMochila(id)">
                            <option value='normal'>Normal</option>
                            <option value='exotica'>Exótica</option>
                            <option value='nomeada'>Nomeada</option>
                            <option value='verde'>Gear Set (Verde)</option>
                            <option value='improvisado'>Improvisado</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="atributo1CentralMochila" class="form-label">Atributo Central: </label>
                        <select class="form-select" name="atributo1-central-mochila" id="atributo1CentralMochila">
                            <option value='dano'>Dano de arma (%)</option>
                            <option value='protecao'>Proteção balística</option>
                            <option value='tier'>Tier de Habilidade</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="valor1AtributoCentralMochila" class="form-label">Valor:</label>
                        <input class="form-control" name="valor1-atributo-central-mochila" id="valor1AtributoCentralMochila" type="number" step=0.1 min=0 placeholder="Insira o valor" required>
                    </div>
                    <div class="col-md-6">
                        <label for="atributo1Mochila" class="form-label">Atributo:</label>
                        <div class="mb-3">
                            <select class="form-select" name="atributo1-mochila" id="atributo1Mochila">
                                @foreach (dicionarioAtributo() as $value => $label)
                                    <option value="{{ $value }}">
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div id="atributo-mochila">
                            <select class="form-select" name="atributo2-mochila" id='select-atributo-mochila-2'>
                                @foreach (dicionarioAtributo() as $value => $label)
                                <option value="{{ $value }}">
                                    {{ $label }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="valor1AtributoMochila" class="form-label">Valor:</label>
                        <div class="mb-3">
                            <input class="form-control" name="valor1-atributo-mochila" id="valor1AtributoMochila" type="number" min="0" step="0.1" placeholder="Insira o valor">
                        </div>
                        <div id="valor-atributo-mochila">
                            <input class="form-control" name="valor2-atributo-mochila" type="number" min=0 step="0.1" placeholder="Insira o valor">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="modificacaoMochila" class="form-label">Modificação:</label>
                        <select class="form-select" name="modificacao-mochila" id="modificacaoMochila">
                            @foreach (dicionarioModificacao() as $value => $label)
                                <option value="{{ $value }}">
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="valorModificacaoMochila" class="form-label">Valor:</label>
                        <input class="form-control" id="valorModificacaoMochila" name="valor-modificacao-mochila" type="number" step="0.1" min=0 placeholder="Insira o valor">
                    </div>
                    <div class="col-md-6 mb-3">
                        <div id='talento-mochila'>
                            <label for="talentoMochila" class="form-label">Talento:</label>
                            <select class="form-select" name="talento-mochila" id="talentoMochila">
                                @foreach (dicionarioTalento() as $value => $label)
                                    <option value="{{ $value }}">
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Colete -->

                <div class="builds row g-3">
                    <h5>Colete:</h5>
                    <div class="col-md-6">
                        <label for="nomeColete" class="form-label">Nome:</label>
                        <input class="form-control" name="nome-colete" id="nomeColete" placeholder="Nome do colete" required>
                    </div>
                    <div class="col-md-4">
                        <label for="tipo-colete" class="form-label">Tipo:</label>
                        <select class="form-select" name='tipo-colete' id="tipo-colete" onchange="funcaoTipoColete(id, 'atributo-colete', 'talento-colete', 'valor-atributo-colete')">
                            <option value='normal'>Normal</option>
                            <option value='exotica'>Exótica</option>
                            <option value='nomeada'>Nomeada</option>
                            <option value='verde'>Gear Set (Verde)</option>
                            <option value='improvisado'>Improvisado</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="atributoCentralColete" class="form-label">Atributo Central: </label>
                        <select class="form-select" name="atributo-central-colete" id="atributoCentralColete">
                            <option value='dano'>Dano de arma (%)</option>
                            <option value='protecao'>Proteção balística</option>
                            <option value='tier'>Tier de Habilidade</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="valorAtributoCentralColete" class="form-label">Valor:</label>
                        <input class="form-control" id="valorAtributoCentralColete" name="valor-atributo-central-colete" type="number" step=0.1 min=0 placeholder="Insira o valor" required>
                    </div>
                    <div class="col-md-6">
                        <label for="atributo1Colete" class="form-label">Atributo:</label>
                        <div class="mb-3">
                            <select class="form-select" name="atributo1-colete" id="atributo1Colete">
                                @foreach (dicionarioAtributo() as $value => $label)
                                    <option value="{{ $value }}">
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div id="atributo-colete">
                            <select class="form-select" name='atributo2-colete' id='select-atributo-colete-2'>
                                @foreach (dicionarioAtributo() as $value => $label)
                                <option value="{{ $value }}">
                                    {{ $label }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="valor1AtributoColete" class="form-label">Valor:</label>
                        <div class="mb-3">
                            <input class="form-control" name="valor1-atributo-colete" id="valor1AtributoColete" type="number" min="0" step="0.1" placeholder="Insira o valor">
                        </div>
                        <div id="valor-atributo-colete">
                            <input class="form-control" name="valor2-atributo-colete" id='input-atributo-colete-2' type="number" min=0 step="0.1" placeholder="Insira o valor">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="modificacaoColete" class="form-label">Modificação:</label>
                        <select class="form-select" name="modificacao-colete" id="modificacaoColete">
                            @foreach (dicionarioModificacao() as $value => $label)
                                <option value="{{ $value }}">
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="valorModificacaoColete" class="form-label">Valor:</label>
                        <input class="form-control" name="valor-modificacao-colete" id="valorModificacaoColete" type="number" step="0.1" min=0 placeholder="Insira o valor">
                    </div>
                    <div class="col-md-6 mb-3">
                        <div id="talento-colete">
                            <h5>Talento:</h5>
                            <select class="form-select" name='talento-colete'>
                                @foreach (dicionarioTalento() as $value => $label)
                                    <option value="{{ $value }}">
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Luvas -->

                <div class="builds row g-3">
                    <h5>Luva:</h5>
                    <div class="col-md-6">
                        <label for="nomeLuva" class="form-label">Nome:</label>
                        <input class="form-control" name="nome-luva" id="nomeLuva" placeholder="Nome da luva" required>
                    </div>
                    <div class="col-md-4">
                        <label for="tipo-luva" class="form-label">Tipo:</label>
                        <select class="form-select" name='tipo-luva' id="tipo-luva" onchange="funcaoTipoLuva(id, 'atributo-luva', 'modificacao-luva', 'valor-atributo-luva', 'valor-modificacao-luva')">
                            <option value='normal'>Normal</option>
                            <option value='exotica'>Exótica</option>
                            <option value='nomeada'>Nomeada</option>
                            <option value='verde'>Gear Set (Verde)</option>
                            <option value='improvisado'>Improvisado</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="atributoCentralLuva" class="form-label">Atributo Central: </label>
                        <select class="form-select" name="atributo-central-luva" id="atributoCentralLuva">
                            <option value='dano'>Dano de arma (%)</option>
                            <option value='protecao'>Proteção balística</option>
                            <option value='tier'>Tier de Habilidade</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="valor1AtributoCentralLuva" class="form-label">Valor:</label>
                        <input class="form-control" name="valor-atributo-central-luva" id="valor1AtributoCentralLuva" type="number" step=0.1 min=0 placeholder="Insira o valor" required>
                    </div>
                    <div class="col-md-6">
                        <label for="atributo1Luva" class="form-label">Atributo:</label>
                        <div class="mb-3">
                            <select class="form-select" id="atributo1Luva" name="atributo1-luva">
                                @foreach (dicionarioAtributo() as $value => $label)
                                    <option value="{{ $value }}">
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div id="atributo-luva">
                            <select class="form-select" name='atributo2-luva' id='select-atributo-luva-2'>
                                @foreach (dicionarioAtributo() as $value => $label)
                                <option value="{{ $value }}">
                                    {{ $label }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="valor1AtributoLuva" class="form-label">Valor:</label>
                        <div class="mb-3">
                            <input class="form-control" name="valor1-atributo-luva" id="valor1AtributoLuva" type="number" min="0" step="0.1" placeholder="Insira o valor">
                        </div>
                        <div id="valor-atributo-luva">
                            <input class="form-control" name="valor2-atributo-luva" id='input-atributo-luva-2'type="number" min=0 step="0.1" placeholder="Insira o valor">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="display: none" id="modificacao-luva">
                            <label for="modificacaoLuva" class="form-label">Modificação:</label>
                            <select class="form-select" name='modificacao-luva' id="modificacaoLuva">
                                @foreach (dicionarioModificacao() as $value => $label)
                                    <option value="{{ $value }}">
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div style="display: none" id="valor-modificacao-luva">
                            <label for="valorModificacaoLuva" class="form-label">Valor:</label>
                            <input class="form-control" name="valor-modificacao-luva" id="valorModificacaoLuva" type="number" step="0.1" min=0 placeholder="Insira o valor">
                        </div>
                    </div>
                </div>

                <!-- Coldre -->

                <div class="builds row g-3">
                    <h5>Coldre:</h5>
                    <div class="col-md-6">
                        <label for="nomeColdre" class="form-label">Nome:</label>
                        <input class="form-control" name="nome-coldre" id="nomeColdre" placeholder="Nome do coldre" required>
                    </div>
                    <div class="col-md-4">
                        <label for="tipo-coldre" class="form-label">Tipo:</label>
                        <select class="form-select" name='tipo-coldre' id="tipo-coldre" onchange="funcaoTipoColdre(id, 'atributo-coldre', 'modificacao-coldre', 'valor-atributo-joelheira', 'valor-modificacao-coldre')">
                            <option value='normal'>Normal</option>
                            <option value='exotica'>Exótica</option>
                            <option value='nomeada'>Nomeada</option>
                            <option value='verde'>Gear Set (Verde)</option>
                            <option value='improvisado'>Improvisado</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="atributoCentralColdre" class="form-label">Atributo Central:</label>
                        <select class="form-select" id="atributoCentralColdre" name="atributo-central-coldre">
                            <option value='dano'>Dano de arma (%)</option>
                            <option value='protecao'>Proteção balística</option>
                            <option value='tier'>Tier de Habilidade</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="valorAtributoCentralColdre" class="form-label">Valor:</label>
                        <input class="form-control" name="valor-atributo-central-coldre" id="valorAtributoCentralColdre" type="number" step=0.1 min=0 placeholder="Insira o valor" required>
                    </div>
                    <div class="col-md-6">
                        <label for="atributo1Coldre" class="form-label">Atributo: </label>
                        <div class="mb-3">
                            <select class="form-select" name="atributo1-coldre" id="atributo1Coldre">
                                @foreach (dicionarioAtributo() as $value => $label)
                                    <option value="{{ $value }}">
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div id="atributo-coldre">
                            <select class="form-select" name='atributo2-coldre' id='select-atributo-coldre-2'>
                                @foreach (dicionarioAtributo() as $value => $label)
                                <option value="{{ $value }}">
                                    {{ $label }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="valor1AtributoColdre" class="form-label">Valor:</label>
                        <div class="mb-3">
                            <input class="form-control" name="valor1-atributo-coldre" id="valor1AtributoColdre" type="number" min="0" step="0.1" placeholder="Insira o valor">
                        </div>
                        <div id="valor-atributo-joelheira">
                            <input class="form-control" name="valor2-atributo-coldre" id='input-atributo-coldre-2' type="number" min=0 step="0.1" placeholder="Insira o valor">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="display: none" id="modificacao-coldre">
                            <label for="modificacaoColdre" class="form-label">Modificação:</label>
                            <select class="form-select" name='modificacao-coldre' id="modificacaoColdre">
                                @foreach (dicionarioModificacao() as $value => $label)
                                    <option value="{{ $value }}">
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div style="display: none" id="valor-modificacao-coldre">
                            <label for="valorModificacaoColdre" class="form-label">Valor:</label>
                            <input class="form-control" name="valor-modificacao-coldre" id="valorModificacaoColdre" type="number" step="0.1" min=0 placeholder="Insira o valor">
                        </div>
                    </div>
                </div>

                <!-- Joelheira -->

                <div class="builds row g-3">
                    <h5>Joelheira:</h5>
                    <div class="col-md-6">
                        <label for="nomeJoelheira" class="form-label">Nome:</label>
                        <input class="form-control" name="nome-joelheira" id="nomeJoelheira" placeholder="Nome da joelheira" required>
                    </div>
                    <div class="col-md-4">
                        <label for="tipo-joelheira" class="form-label">Tipo:</label>
                        <select class="form-select" name='tipo-joelheira' id="tipo-joelheira" onchange="funcaoTipoJoelheira(id, 'atributo-joelheira', 'modificacao-joelheira', 'valor-atributo-joelheira', 'valor-modificacao-joelheira')">
                            <option value='normal'>Normal</option>
                            <option value='exotica'>Exótica</option>
                            <option value='nomeada'>Nomeada</option>
                            <option value='verde'>Gear Set (Verde)</option>
                            <option value='improvisado'>Improvisado</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="atributoCentralJoelheira" class="form-label">Atributo Central:</label>
                        <select class="form-select" name="atributo-central-joelheira" id="atributoCentralJoelheira">
                            <option value='dano'>Dano de arma (%)</option>
                            <option value='protecao'>Proteção balística</option>
                            <option value='tier'>Tier de Habilidade</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="valorAtributoCentral" class="form-label">Valor:</label>
                        <input class="form-control" name="valor-atributo-central-joelheira" id="valorAtributoCentral" step=0.1 min=0 placeholder="Insira o valor" required>
                    </div>
                    <div class="col-md-6">
                        <label for="atributo1Joelheira" class="form-label">Atributo:</label>
                        <div class="mb-3">
                            <select class="form-select" name="atributo1-joelheira" id="atributo1Joelheira">
                                @foreach (dicionarioAtributo() as $value => $label)
                                    <option value="{{ $value }}">
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div id="atributo-joelheira">
                            <select class="form-select" name='atributo2-joelheira' id='select-atributo-joelheira-2'>
                                @foreach (dicionarioAtributo() as $value => $label)
                                <option value="{{ $value }}">
                                    {{ $label }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="valor1AtributoJoelheira" class="form-label">Valor:</label>
                        <div class="mb-3">
                            <input class="form-control" name="valor1-atributo-joelheira" id="valor1AtributoJoelheira" type="number" min="0" step="0.1" placeholder="Insira o valor">
                        </div>
                        <div id="valor-atributo-joelheira">
                            <input class="form-control" name="valor2-atributo-joelheira" id='input-atributo-joelheira-2' type="number" min=0 step="0.1" placeholder="Insira o valor">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div style="display:none" id="modificacao-joelheira">
                            <label for="modificacaoJoelheira" class="form-label">Modificação:</label>
                            <select class="form-select" name='modificacao-joelheira' id="modificacaoJoelheira">
                                @foreach (dicionarioModificacao() as $value => $label)
                                    <option value="{{ $value }}">
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div style="display:none" id="valor-modificacao-joelheira">
                            <label for="valorModificacaoJoelheira" class="form-label">Valor:</label>
                            <input class="form-control" name="valor-modificacao-joelheira" id="valorModificacaoJoelheira" type="number" min=0 step="0.1" placeholder="Insira o valor">
                        </div>
                    </div>
                </div>

                <!-- Habilidades -->

                <div class="builds row g-3">
                    <div class="col-md-4">
                        <label for="habilidade1" class="form-label">Habilidade 1:</label>
                        <select class="form-select" name="habilidade1" id="habilidade1">
                            @foreach (dicionarioSHDTech() as $value => $label)
                                    <option value="{{ $value }}">
                                        {{ $label }}
                                    </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="habilidade2" class="form-label">Habilidade 2:</label>
                        <select class="form-select" name="habilidade2" id="habilidade2">
                            @foreach (dicionarioSHDTech() as $value => $label)
                                    <option value="{{ $value }}">
                                        {{ $label }}
                                    </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- E FIM -->
                <button style="float: right" class="btn btn-success mb-5" id="buttonFormAdicionarBuild" type="submit">Adicionar</button>
            </form>
            <script type="text/javascript">
                $(document).ready(function()
                {
                    $('#adicionarBuildForm').on('submit', function(event)
                    {
                        event.preventDefault();
                        $('#mensagemFormAdicionarBuild').html("");
                        var button = document.getElementById('buttonFormAdicionarBuild');
                        button.disabled = true;
                        var formData = new FormData(this);
                        jQuery.ajax(
                            {
                            url: "{{route('useraccount.builds.td2.adicionar.post', ['name' => $_SESSION['nome']])}}",
                            data: formData,
                            contentType: false,
                            processData: false,
                            type: "POST",
                            success:function(result)
                            {
                                jQuery('#adicionarBuildForm')[0].reset();
                                var alerta = '<div class="alert alert-success" role="alert">';
                                alerta = alerta + result.mensagem + '</div>';
                                window.scrollTo({ top: 0, behavior: 'smooth' });
                                $('#mensagemFormAdicionarBuild').html(alerta);
                                var button = document.getElementById('buttonFormAdicionarBuild');
                                button.disabled = false;
                            },
                            error:function(xhr, status, error)
                            {
                                var mensagens = xhr.responseJSON.mensagem;
                                var alerta = '<div class="alert alert-danger" role="alert">';
                                for (const chave in mensagens) {
                                    alerta = alerta + mensagens[chave] + '<br>';
                                }
                                alerta = alerta + '</div>';
                                window.scrollTo({ top: 0, behavior: 'smooth' });
                                $('#mensagemFormAdicionarBuild').html(alerta);
                                var button = document.getElementById('buttonFormAdicionarBuild');
                                button.disabled = false;
                            }
                        })
                    })
                })
            </script>
        </main>
        <?php
        }?>
        @include('imports.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>