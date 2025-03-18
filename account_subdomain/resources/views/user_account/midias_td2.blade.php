<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Minhas Mídias | Black Wolves</title>
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        @vite(['resources/scss/estilo_midia.scss'])
        <meta name="robots" content="noindex">
    </head>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        function apagarMensagem(id){
            var id = document.getElementById(id);
            var mensagem = "";
            $(id).html(mensagem);
        }

        function confirmButton(){
            return confirm('Pressione OK para confirmar:');
        }
        function mostrarId(input, span){
            var inputId = document.getElementById(input);
            var spanId = document.getElementById(span);
            if (inputId.type == 'password'){
                inputId.type = "text";
                inputId.style.userSelect = "none";
                $(spanId).html('Esconder');
            }else {
                inputId.type = "password";
                inputId.style.userSelect = "text";
                $(spanId).html('Mostrar');
            }
        }
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
            <a href="{{route('useraccount.midia.td2.adicionar', ['name' => $_SESSION['nome']])}}">
                <button class="btn btn-primary">ADICIONAR MÍDIA</button>
            </a>
        </nav>
        <main class="container">
            <div id="opcoes">
                <div class="midias-content mt-3 mb-5">
                    <h1 class="mb-4">MINHAS MÍDIAS | Tom Clancy's The Division 2</h1>
                    @if(isset($midias))
                        {{$midias->links()}}
                        @foreach ($midias as $midia)
                        <div class="midias">
                            <div class="row mb-3">
                                <div class="col-auto">
                                    <?php
                                        $extensao = substr($midia->nome_arquivo, -4);
                                        if ($extensao == '.mp4'){?>
                                            <video width="460" controls>
                                                <source src="http://127.0.0.1:8000/videos/{{$midia->nome_arquivo}}" type="video/mp4">
                                            </video>
                                        <?php
                                        } else {?>
                                            <img src="http://127.0.0.1:8000/img/screenshots/{{$midia->nome_arquivo}}" width="460">
                                        <?php
                                        }
                                    ?>
                                </div>
                                <div class="col-auto pt-4">
                                    <p><strong>ID:</strong>
                                        <div class="input-group flex-nowrap">
                                            <input id="{{'_'.$midia->id}}" style="width: 330px" type="password" class="form-control" value="{{$midia->id}}" disabled>
                                            <button id="{{'_'.$midia->id.'_'}}" type="button" onclick="mostrarId('{{'_'.$midia->id}}', id)" class="btn btn-secondary input-group-text" id="addon-wrapping">Mostrar</button>
                                        </div>
                                    </p>
                                    @if($extensao == '.mp4')
                                        <p><strong>Título:</strong>
                                        {{$midia->titulo}}
                                        </p>
                                    @endif
                                    <form id="excluir-{{$midia->id}}">
                                        @csrf
                                        @if($extensao == '.mp4')
                                            <input name="tipo-arquivo" value="arquivo mp4" type="hidden">
                                        @else
                                            <input name="tipo-arquivo" value="arquivo webp" type="hidden">
                                        @endif
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
                                    <script type="text/javascript">
                                        $(document).ready(function()
                                        {
                                            $('#excluir-{{$midia->id}}').on('submit', function(event)
                                            {
                                                event.preventDefault();
                                                var confirm = confirmButton();
                                                if (confirm == false){
                                                    return;
                                                }
                                                jQuery.ajax(
                                                    {
                                                    url: "{{route('midia.excluir', ['id' => $midia->id])}}",
                                                    data:  jQuery('#excluir-{{$midia->id}}').serialize(),
                                                    type: "DELETE",
                                                    success:function(result)
                                                    {
                                                        alert(result.mensagem);
                                                        window.location.reload();
                                                    },
                                                    error:function(xhr, status, error)
                                                    {
                                                        alert(xhr.responseJSON.mensagem);
                                                    }
                                                })
                                            })
                                        })
                                    </script>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{$midias->links()}}
                    @endif
                </div>
            </div>
        </main>
        <?php
        }?>
        @include('imports.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>