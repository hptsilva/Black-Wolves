<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Adicionar Mídia | Black Wolves</title>
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/estilo_adicionar_media.css?v=1.5')}}">
        <meta name="robots" content="noindex">
    </head>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        function apagarMensagem(id){
            var id = document.getElementById(id);
            var mensagem = "";
            $(id).html(mensagem);
        }
        function alterarTipoForm(id){
            formulario = document.getElementById(id);
            if (id == 'formImagem'){
                formulario.style.display = 'block';
                document.getElementById('formVideo').style.display = 'none';
                jQuery('#adicionarVideoForm')[0].reset();
                $('#mensagemFormAdicionarVideo').html('');
                var progressBarVideo = document.getElementById('progressBarVideo');
                progressBarVideo.style.width = '0%';
            }else {
                formulario.style.display = 'block';
                document.getElementById('formImagem').style.display = 'none';
                jQuery('#adicionarImagemForm')[0].reset();
                $('#mensagemFormAdicionarImagem').html('');
                var progressBarImagem = document.getElementById('progressBarImagem');
                progressBarImagem.style.width = '0%';
            }
        }

    </script>
    <body>
        @if(isset($_SESSION['autenticado']))
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
            <a href="{{route('useraccount.midia.td2', ['name' => $_SESSION['nome']])}}">
                <button class="btn btn-primary">VOLTAR</button>
            </a>
        </nav>
        <main class="container">
            <div class="builds-content mt-3">
                <h1 class="mb-4">ADICIONAR MÍDIA | Tom Clancy's The Division 2</h1>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" onclick="alterarTipoForm('formImagem')" name="opMidia" id="checkImagem" value="option1" checked>
                <label class="form-check-label" for="checkImagem">
                    Imagem
                </label>
            </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" onclick="alterarTipoForm('formVideo')" name="opMidia" id="checkVideo" value="option2">
                <label class="form-check-label" for="checkVideo">
                    Vídeo
                </label>
            </div>
            <br>
            <div style="display: none" id="formVideo">
                <div id="mensagemFormAdicionarVideo">
                </div>
                <form id="adicionarVideoForm">
                    @csrf
                    <div class="builds row g-3">
                        <div class="col-md-6 mb-1">
                            <label for="videoMidia" class="form-label">Vídeo (Formato .mp4):</label>
                            <input id='videoMidia' type="file" class="form-control" name="video-midia" accept="video/mp4" required>
                        </div>
                        <div class="col-md-6 mb-1">
                            <label for="thumbnailVideoMidia" class="form-label">Thumbnail (Formato .jpg | .png | .webp):</label>
                            <input id='thumbnailVideoMidia' type="file" class="form-control" name="video-midia-thumbnail" accept="image/*" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tituloMidia" class="form-label">Título (Máximo 50 caracteres):</label>
                            <input id='tituloMidia' type="text" class="form-control" name="titulo-video-midia" max=50 required>
                        </div>
                    </div>
                    Progresso: <strong id="percentValorVideo">0%</strong>
                    <div class="progress mb-4" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        <div id="progressBarVideo" class="progress-bar" style="width: 0%"></div>
                    </div>
                    <button style="float: right" class="btn btn-success mb-5" id="buttonFormAdicionarVideo" type="submit">Adicionar</button>
                </form>
                <script type="text/javascript">
                    $(document).ready(function()
                    {
                        $('#adicionarVideoForm').on('submit', function(event)
                        {
                            event.preventDefault();
                            var formData = new FormData(this);
                            
                            $('#checkImagem').prop('disabled' , true);
                            $('#mensagemFormAdicionarVideo').html("");
                            $('#buttonFormAdicionarVideo').prop('disabled', true);
                            $('#buttonFormAdicionarVideo').text("Enviando...");
                            $('#progressBarVideo').width('0%');
                            $('#percentValorVideo').html('0%');
                            jQuery.ajax(
                                {
                                    xhr: function () {
                                    var xhr = new window.XMLHttpRequest();

                                    // Progresso do upload
                                    xhr.upload.addEventListener("progress", function (evt) {
                                        if (evt.lengthComputable) {
                                            var percentComplete = Math.round((evt.loaded / evt.total) * 100);
                                            $('#percentValorVideo').html(percentComplete + '%');
                                            $('#progressBarVideo').width( percentComplete + '%');
                                            if (percentComplete == 100) {
                                                $('#buttonFormAdicionarVideo').text("Processando...");
                                            }
                                        }
                                    }, false);

                                    return xhr;
                                },
                                url: "{{route('useraccount.midia.td2.adicionar.video.post', ['name' => $_SESSION['nome']])}}",
                                timeout: 480000,
                                data: formData,
                                contentType: false,
                                processData: false,
                                type: "POST",
                                success:function(result)
                                {
                                    jQuery('#adicionarVideoForm')[0].reset();
                                    var alerta = '<div class="alert alert-success" role="alert">';
                                    alerta = alerta + result.mensagem + '</div>';
                                    $('#mensagemFormAdicionarVideo').html(alerta);
                                    $('#buttonFormAdicionarVideo').prop('disabled', false);
                                    $('#buttonFormAdicionarVideo').text("Adicionar");
                                    $('#checkImagem').prop('disabled' , false);
                                },
                                error:function(xhr, status, error)
                                {
                                     if (status === 'timeout') {
                                        alert('A requisição demorou muito e foi abortada.');
                                        $('#progressBarVideo').width('0%');
                                        $('#buttonFormAdicionarVideo').prop('disabled', false);
                                        $('#buttonFormAdicionarVideo').text("Adicionar");
                                        $('#checkImagem').prop('disabled' , false);
                                         $('#percentValorVideo').html('0%');
                                        return;
                                     }
                                    var mensagens = xhr.responseJSON.mensagem;
                                    var alerta = '<div class="alert alert-danger" role="alert">';
                                    for (const chave in mensagens) {
                                        alerta = alerta + mensagens[chave] + '<br>';
                                    }
                                    alerta = alerta + '</div>';
                                    $('#mensagemFormAdicionarVideo').html(alerta);
                                    $('#progressBarVideo').width('0%');
                                    $('#buttonFormAdicionarVideo').prop('disabled', false);
                                    $('#buttonFormAdicionarVideo').text("Adicionar");
                                    $('#checkImagem').prop('disabled' , false);
                                    $('#percentValorVideo').html('0%');
                                }
                            })
                        })
                    })
                </script>
            </div>
            <div id="formImagem">
                <div id="mensagemFormAdicionarImagem">
                </div>
                <form id="adicionarImagemForm">
                    @csrf
                    <div class="builds row g-3">
                        <div class="col-md-6 mb-3">
                            <label for="imagemMidia" class="form-label">Imagem (Formato .webp):</label>
                            <input id='imagemMidia' type="file" class="form-control" name="imagem-midia" accept="image/webp" required>
                        </div>
                    </div>
                    Progresso: <strong id="percentValorImagem">0%</strong>
                    <div class="progress mb-4" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        <div id="progressBarImagem" class="progress-bar" style="width: 0%"></div>
                    </div>
                    <button style="float: right" class="btn btn-success mb-5" id="buttonFormAdicionarImagem" type="submit">Adicionar</button>
                </form>   
                <script type="text/javascript">
                    $(document).ready(function()
                    {
                        $('#adicionarImagemForm').on('submit', function(event)
                        {
                            event.preventDefault();
                            var formData = new FormData(this);
                            
                            $('#checkVideo').prop('disabled' , true);
                            $('#mensagemFormAdicionarImagem').html("");
                            $('#buttonFormAdicionarImagem').prop('disabled', true);
                            $('#buttonFormAdicionarImagem').text("Enviando...");
                            $('#progressBarImagem').width('0%');
                            $('#percentValorImagem').html('0%');
                            jQuery.ajax(
                                {
                                    xhr: function () {
                                    var xhr = new window.XMLHttpRequest();

                                    // Progresso do upload
                                    xhr.upload.addEventListener("progress", function (evt) {
                                        if (evt.lengthComputable) {
                                            var percentComplete = Math.round((evt.loaded / evt.total) * 100);
                                            $('#percentValorImagem').html(percentComplete + '%');
                                            $('#progressBarImagem').width(percentComplete + '%');
                                            if (percentComplete == 100) {
                                                $('#buttonFormAdicionarImagem').text("Processando...");
                                            }
                                        }
                                    }, false);

                                    return xhr;
                                },
                                url: "{{route('useraccount.midia.td2.adicionar.imagem.post', ['name' => $_SESSION['nome']])}}",
                                data: formData,
                                contentType: false,
                                processData: false,
                                type: "POST",
                                success:function(result)
                                {
                                    jQuery('#adicionarImagemForm')[0].reset();
                                    var alerta = '<div class="alert alert-success" role="alert">';
                                    alerta = alerta + result.mensagem + '</div>';
                                    $('#mensagemFormAdicionarImagem').html(alerta);
                                    $('#buttonFormAdicionarImagem').prop('disabled', false);
                                    $('#buttonFormAdicionarImagem').text("Adicionar");
                                    $('#checkVideo').prop('disabled' , false);
                                },
                                error:function(xhr, status, error)
                                {
                                    var mensagens = xhr.responseJSON.mensagem;
                                    var alerta = '<div class="alert alert-danger" role="alert">';
                                    for (const chave in mensagens) {
                                        alerta = alerta + mensagens[chave] + '<br>';
                                    }
                                    alerta = alerta + '</div>';
                                    $('#mensagemFormAdicionarImagem').html(alerta);
                                    $('#progressBarImagem').width('0%');
                                    $('#buttonFormAdicionarImagem').prop('disabled', false);
                                    $('#buttonFormAdicionarImagem').text("Adicionar");
                                    $('#checkVideo').prop('disabled' , false);
                                    $('#percentValorImagem').html('0%');
                                }
                            })
                        })
                    })
                </script>
            </div>
        </main>
        @endif
        @include('imports.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script>
            const inputFileVideo = document.getElementById('videoMidia');
            inputFileVideo.addEventListener('change', function(event) {
                const file = event.target.files[0];

                // Verifica o tipo do arquivo (extensão)
                if (file.type !== 'video/mp4') {
                    alert('Por favor, selecione um arquivo .mp4.');
                    inputFileVideo.value = "";
                    return;
                }

                // Converte o tamanho do arquivo para megabytes (MB)
                var fileSizeInMB = file.size / (1024*1024);

                // Verifica o tamanho do arquivo
                if (fileSizeInMB > 250) {
                    alert('O arquivo excede o limite de 250 MB.');
                    inputFileVideo.value = "";
                    return;
                }

                // Se o arquivo passar pelas verificações, você pode prosseguir com o upload ou outras ações
                console.log('Arquivo válido:', file.name);
            });
            
            const thumbnailVideoMidia = document.getElementById('thumbnailVideoMidia');
            thumbnailVideoMidia.addEventListener('change', function(event) {
                const file = event.target.files[0];
                
                // Verifica o tipo do arquivo (extensão)
                if (file.type === 'image/png' || file.type === 'image/jpg' || file.type === 'image/webp'){
                    // Nada acontece
                } else {
                    alert('Por favor, selecione um arquivo .png, .jpg ou .webp');
                    thumbnailVideoMidia.value = "";
                    return
                }
                
                // Converte o tamanho do arquivo para megabytes (MB)
                var fileSizeInMB = file.size / (1024*1024);
                
                if (fileSizeInMB > 5){
                    alert('O arquivo excede o limite de 5 MB');
                    thumbnailVideoMidia.value = "";
                    return
                }
                
                // Se o arquivo passar pelas verificações, você pode prosseguir com o upload ou outras ações
                console.log('Arquivo válido:', file.name);
            });

            const inputFileImagem = document.getElementById('imagemMidia');
            inputFileImagem.addEventListener('change', function(event) {
                const file = event.target.files[0];

                // Verifica o tipo do arquivo (extensão)
                if (file.type !== 'image/webp') {
                    alert('Por favor, selecione um arquivo .webp.');
                    inputFileImagem.value = "";
                    return;
                }

                // Converte o tamanho do arquivo para megabytes (MB)
                var fileSizeInMB = file.size / (1024*1024);

                // Verifica o tamanho do arquivo
                if (fileSizeInMB > 5) {
                    alert('O arquivo excede o limite de 5 MB.');
                    inputFileImagem.value = "";
                    return;
                }

                // Se o arquivo passar pelas verificações, você pode prosseguir com o upload ou outras ações
                console.log('Arquivo válido:', file.name);
            });
        </script>
    </body>
</html>