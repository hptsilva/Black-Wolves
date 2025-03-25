<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Account | Black Wolves</title>
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/estilo_entrar.css?v=9.6')}}">
        <meta name="robots" content="noindex">
    </head>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        function apagarMensagem(id){
            var id = document.getElementById(id);
            var mensagem = "";
            $(id).html(mensagem);
            jQuery('#form-cadastrar')[0].reset();
        }
    </script>
    <body>
        <?php
        if(!isset($_SESSION['autenticado'])){?>
        <section>
            <div class="container" id="container-formulario">
                <form action="{{ route('useraccount.autenticar') }}" method="POST" class="formulario d-flex flex-column">
                    @csrf
                    <div class="form-entrar">
                        <div class="form-logo text-center">
                            <img src="{{asset('img/logo.png')}}" width="60">
                            <span>BLACK WOLVES</span>
                        </div>
                        <h1 class="mb-3 text-center">ENTRAR</h1>
                        <div class="mensagem-erro text-center">{{ isset($erro) && $erro != '' ? $erro : ''}}</div>
                        <div class="form-floating mb-3">
                            <input class="form-control text-start" type="text" value="{{ old('user')}}" id="user" name="user" size=50 required>
                            <label for="user">Usuário</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control text-start" type="password" name="password" id="senha-login" size=50 aria-describedby="passwordHelpBlock" required>
                            <label for="senha-login">Senha</label>
                        </div>
                        <button class="btn btn-success" type="submit" id="submit">Entrar</button><br>
                    </div>
                </form>
                <div class="signup text-center mt-1">
                    <strong type="button" data-bs-toggle="modal" data-bs-target="#cadastrar">CADASTRE-SE</strong>
                </div>
                <div class="modal fade" id="cadastrar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form id="form-cadastrar">
                                @csrf
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastre-se</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  onclick="apagarMensagem('mensagem-cadastrar')"></button>
                                </div>
                                <div class="modal-body">
                                    <div id="mensagem-cadastrar">
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" id="token" name="codigo" required>
                                        <label for="token">Código de cadastro*</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" id="user_name" name="user_cadastrar" size="50" required>
                                        <label for="user_name">Nome de usuário</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="password" id="password" name="password" size="50" required>
                                        <label for="password">Senha</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="password" id="password_confirm" name="password_confirm" size="50" required>
                                        <label for="password_confirm">Confirmar senha</label>
                                    </div>
                                    <span>* Peça o código de cadastro ao líder do clã.</span><br>
                                    <script type="text/javascript">
                                        $(document).ready(function()
                                        {
                                            $('#form-cadastrar').on('submit', function(event)
                                            {
                                                var button = document.getElementById('button-cadastrar');
                                                button.disabled = true;
                                                event.preventDefault();
                                                jQuery.ajax(
                                                    {
                                                    url: "{{route('signup')}}",
                                                    data: jQuery('#form-cadastrar').serialize(),
                                                    type: "POST",
                                                    success:function(result)
                                                    {
                                                        jQuery('#form-cadastrar')[0].reset();
                                                        var alerta = '<div class="alert alert-success" role="alert">';
                                                        alerta = alerta + result.mensagem + '</div>';
                                                        $('#mensagem-cadastrar').html(alerta);
                                                        var button = document.getElementById('button-cadastrar');
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
                                                        $('#mensagem-cadastrar').html(alerta);
                                                        var button = document.getElementById('button-cadastrar');
                                                        button.disabled = false;
                                                    }
                                                })
                                            })
                                        })
                                    </script>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="button-cadastrar" class="btn btn-success">Cadastrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        }?>
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