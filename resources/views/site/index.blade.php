<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Home | Black Wolves</title>
        <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/estilo_home.css?v=11.0')}}">
        <meta name="robots" content="noindex">
    </head>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <body>
        <header>
            <div class="container" id="header">
                <a class="logo" href="{{route('home')}}">
                    <img id="logo" src="{{asset('img/wolf_logo.png')}}" alt="Black Wolves" width="180" height="202px">
                </a>
                @if(isset($_SESSION['autenticado']))
                    <nav class="navbar navbar-expand-md" id="navbar">
                    <button class="navbar-toggler justify-content-center" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span>&equiv;</span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a style="color: #fc6e0d" class='nav-link' href="{{route('home')}}">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class='nav-link' href="{{route('ofensivo')}}">BUILDS</a>
                            </li>
                            <li class="nav-item">
                                <a class='nav-link' href="{{route('media.screenshot', ['page' => 1])}}">MÍDIA</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                @endif
                @if(!isset($_SESSION['autenticado']))
                    <a class="conta" href="{{route('signin')}}" id="conta">
                        <img id="icon-conta" src="{{asset('icons/profile.png')}}">
                    </a>
                @else
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
                @endif
            </div>
        </header>
        <main>
            <div id='container-intro'>
                <div class="container text-center">
                    <div class="row justify-content-md-center">
                        <div class="col" id="text-intro1">
                            <span>QUEM SOMOS ?</span><br><br>
                            <p>Somos os Black Wolves, um clã com o objetivo de garantir um ambiente saudável e amigável na comunidade gamer.</p>
                            <p>Nosso clã é caracterizado por respeito, colaboração e uma paixão compartilhada por jogos.</p>
                            <p>Estamos sempre abertos a novos membros e você pode ser um Black Wolf.</p>
                            @if(isset($_SESSION['autenticado']))
                                <button type="button" class="btn btn-primary" role="button" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-content="Você já faz parte do clã.">FAÇA PARTE</button>
                            @else
                                <button type="button" class="btn btn-primary" role="button" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-content="Indisponível no momento">FAÇA PARTE</button>
                            @endif
                        </div>
                        <div class="col" id="imagem-intro">
                            <img id="imagem-wolf" src="{{asset('img/wolf.jpg')}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container text-center container-intro2">
                <div class="row justify-content-md-center">
                    <div class="col text-start">
                        <img id="imagem-grupo" src="{{asset('img/foto-grupo.jpg')}}">
                    </div>
                    <div class="col" id="text-intro2">
                        <p style="color: White">O clã foi formado em 2022. Nossa gameplay principal é focada na franquia de jogos Tom Clancy's The Division.</p>
                        <p  style="color: White">Você nos encontrará sempre farmando XP, realizando Raids e Incursões.</p>
                    </div>
                </div>
            </div>
            @if(isset($_SESSION['autenticado']))
            <section>
                <div class="p-5">
                </div>
            </section>
            @endif
            @if(!isset($_SESSION['autenticado']))
                <div class='titulo'>
                    <h1 class="container">GALERIA DE FOTOS</h1>
                </div>
                <section class="container conteudo-media">
                    </div>
                    <div class="row imagem text-center">
                        @foreach ($capturas as $foto)
                        <div class="col">
                            <a href="/img/screenshots/<?php echo $foto->nome_arquivo; ?>" target="_blank" rel="noopener noreferrer"><img class="img-thumbnail" src="{{ asset('/img/screenshots/'.$foto->nome_arquivo) }}"></a>
                        </div>
                        @endforeach
                    </div>
                    <div class="row imagem text-center" id="galeria">
                    </div>
                    <div class="d-flex mt-4 justify-content-center button-galeria">
                        <button type="button" id="button-galeria" class="btn btn-primary">MOSTRAR TUDO</button>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function()
                        {
                            $('#button-galeria').on('click', function(event)
                            {
                                var button = document.getElementById('button-galeria');
                                button.style.disabled = 'true';
                                jQuery.ajax(
                                    {
                                    url: "{{route('galeria.fotos')}}",
                                    type: "GET",
                                    success:function(result)
                                    {
                                        const conteudo = result.mensagem;
                                        var imagens = '';
                                        for(let index = 0; index < conteudo.length; ++index){
                                            imagens = imagens + "<div class='col'><a href='/img/screenshots/" + conteudo[index].nome_arquivo + '\'' + " target='_blank' rel='noopener noreferrer'><img class='img-thumbnail' src='{{route('home')}}/img/screenshots/" + conteudo[index].nome_arquivo + '\'' + "></a></div>";
                                        }
                                        $('#galeria').html(imagens);
                                        button.style.display = 'none';
                                        const alturaTotal = document.documentElement.scrollHeight;
                                        window.scrollTo({
                                            top: alturaTotal,
                                            behavior: 'smooth'
                                        });
                                    },
                                    error:function(xhr, status, error)
                                    {
                                        console.log("Erro ao recuperar recurso.");
                                    }
                                })
                            })
                        })
                    </script>
                </section>
            @endif
        </main>
        <footer>
            <div class="rodape">
                <span>2022-2024 - Clã Black Wolves (BKW)</span>
                <div class="creditos">
                    <p>Desenvolvido por <button class="btn creditos-nome" type="button" role="button" data-bs-toggle="popover" data-bs-placement="top" data-bs-container="body" data-bs-content="humbertot@hotmail.com.br | Logo criada por Ramavi |">Humberto Silva</button></p>
                </div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script>
            const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
            const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
        </script>
    </body>
</html>