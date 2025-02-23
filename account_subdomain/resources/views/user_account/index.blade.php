<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>{{$_SESSION['nome']}} | Black Wolves</title>
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        @vite(['resources/scss/estilo_index.scss'])
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
    <body>
        @if(isset($_SESSION['autenticado']))
            @include('imports.header')
            <div>
                <form method="POST" action="{{route('signout')}}">
                    @csrf
                    <button type="submit" class="sair">Sair</button>
                </form>
            </div>
            @include('imports.agente_description')
            @include('imports.offcanvas_header')
            <nav class="nav-opcoes-index navbar navbar-expand-sm container mt-2">
                <ul class="navbar-nav">
                    <li class="nav-item m-2">
                        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#canvasConfiguracoesConta" aria-controls="offcanvasWithBothOptions">CONFIGURAÇÕES</button>
                    </li>
                    <li class="nav-item m-2">
                        <div class="dropdown">
                            <span class="dropdown-toggle dropdown-opcoes" data-bs-toggle="dropdown" aria-expanded="false" type="button">MINHAS BUILDS</span>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('useraccount.builds.td2', ['name' => $_SESSION['nome']])}}">Tom Clancy's The Division 2</a></li>
                                <li><a style="cursor: not-allowed" class="dropdown-item">Tom Clancy's The Division 3</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item m-2">
                        <div class="dropdown">
                            <span class="dropdown-toggle dropdown-opcoes" data-bs-toggle="dropdown" aria-expanded="false" type="button">MINHAS MÍDIAS</span>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('useraccount.midia.td2', ['name' => $_SESSION['nome']])}}">Tom Clancy's The Division 2</a></li>
                                <li><a style="cursor: not-allowed" class="dropdown-item">Tom Clancy's The Division 3</a></li>
                            </ul>
                        </div>
                    </li>
                    @if($_SESSION['is_adm'] == 1)
                        <li class="nav-item m-2">
                            <a href="{{route('admin.index', ['name' => $_SESSION['nome']])}}"><button class="btn btn-warning" type="button">ADMINISTRADOR</button><a>
                        </li>
                    @endif
                </ul>
            </nav>
        @endif
        @include('imports.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>