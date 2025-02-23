<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Defensivo | Black Wolves</title>
        <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/estilo_builds.css?v=8.6')}}">
        <meta charset="utf-8">
        <meta http-equiv="Cache-Control" content="no-cache">
        <meta name="robots" content="noindex">
    </head>
    <body>
        <header>
            <div class="container" id="header">
                <a class="logo" href="{{route('home')}}">
                    <img src="{{asset('img/logo.png')}}" alt="Black Wolves" width="50">
                </a>
                <nav class="navbar navbar-expand-md" id="navbar">
                    <button class="navbar-toggler justify-content-center" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span>&equiv;</span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class='nav-link' href="{{route('home')}}">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a style="color: #fc6e0d" class='nav-link' href="{{route('ofensivo')}}">BUILDS</a>
                            </li>
                            <li class="nav-item">
                                <a class='nav-link' href="{{route('media.screenshot', ['page' => 1])}}">MÍDIA</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <?php
                if(!isset($_SESSION['autenticado'])){?>
                    <a class="conta" href="{{route('conta')}}" id="conta">
                        <img id="icon-conta" src="{{asset('icons/conta_laranja.png')}}">
                    </a>
                <?php
                } else { ?>
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
                                    <a href="https://account.blackwolvesclan.com.br/" target="_blank" rel="noopener noreferrer" >Meu agente</a>
                                </li>
                                <li class="dropdown-item">
                                    <form method="POST" action="{{route('signout')}}">
                                        @csrf
                                        <button type="submit" class="sair">Sair</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </header>
        <div class='titulo-build'>
            <nav class="navbar navbar-expand-sm">
                <div class='nav-builds'>
                    <a href="{{route('ofensivo')}}"class="btn btn-secondary">OFENSIVO</a>
                    <a href="{{route('defensivo')}}" class="btn btn-secondary" style="color: #fc6e0d;">DEFENSIVO</a>
                    <a href="{{route('utilitario')}}" class="btn btn-secondary">UTILITÁRIO</a>
                    <a href="{{route('raid')}}" class="btn btn-secondary">RAID</a>
                </div>
            </nav>
        </div>
        <main>
            <div id='container-builds'>
                <div class="container text-center">
                    @include('site.builds.tank')
                </div>
            </div>
        </main>
        <footer>
            <div class="rodape">
                <span>2022-2024 - Clã Black Wolves (BKW)</span>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>