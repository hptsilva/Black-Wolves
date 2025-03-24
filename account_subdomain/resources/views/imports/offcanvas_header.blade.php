<aside>
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="canvasConfiguracoesConta" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
            <h4 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Configurações de conta</h4>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body text-start">
            <p type="button" data-bs-toggle="modal" data-bs-target="#alterarNomeAgente">Alterar nome do Agente</p>
            <p type="button" data-bs-toggle="modal" data-bs-target="#alterarFotoAgente">Alterar foto do Agente</p>
            <p type="button" data-bs-toggle="modal" data-bs-target="#alterarNomeUsuario">Alterar nome de usuário</p>
            <p type="button" data-bs-toggle="modal" data-bs-target="#alterarSenha">Alterar senha</p>
        </div>
    </div>
</aside>
<div class="modal fade" id="alterarNomeAgente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form-alterar-nome-agente">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Alterar nome do Agente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  onclick="apagarMensagem('mensagem-alterar-nome-agente')"></button>
                </div>
                <div class="modal-body">
                    <div id="mensagem-alterar-nome-agente">
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control border" type="text" id="nome_agente" name="nome_agente" size=15 required>
                        <label for="nome_agente">Nome do Agente</label>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function()
                        {
                            $('#form-alterar-nome-agente').on('submit', function(event)
                            {
                                event.preventDefault();

                                jQuery.ajax(
                                    {
                                    url: "{{route('agente.alterar.nome')}}",
                                    data: jQuery('#form-alterar-nome-agente').serialize(),
                                    type: "PATCH",
                                    success:function(result)
                                    {
                                        jQuery('#form-alterar-nome-agente')[0].reset();
                                        $('#mensagem-alterar-nome-agente').html(result.mensagem);
                                    },
                                    error:function(xhr, status, error)
                                    {
                                        $('#mensagem-alterar-nome-agente').html(xhr.responseJSON.mensagem);
                                    }

                                })
                            })
                        })
                    </script>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="alterarFotoAgente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form-alterar-foto-agente">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Alterar foto do Agente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  onclick="apagarMensagem('mensagem-alterar-nome-agente')"></button>
                </div>
                <div class="modal-body">
                    <div id="mensagem-alterar-foto-agente">
                    </div>
                    <div class="row">
                        <div class=col>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="foto" value="2">
                                <img src="{{asset('img/foto_perfil/1.jpg')}}" width="60"> 
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="foto" value="3">
                                <img src="{{asset('img/foto_perfil/2.jpg')}}" width="60">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="foto" value="4">
                                <img src="{{asset('img/foto_perfil/3.jpg')}}" width="60">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="foto" value="5">
                                <img src="{{asset('img/foto_perfil/4.jpg')}}" width="60">
                            </div>
                        </div>
                        <div class=col>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="foto" value="6">
                                <img src="{{asset('img/foto_perfil/5.jpg')}}" width="60">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="foto" value="7">
                                <img src="{{asset('img/foto_perfil/6.jpg')}}" width="60">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="foto" value="8">
                                <img src="{{asset('img/foto_perfil/7.jpg')}}" width="60">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="foto" value="9">
                                <img src="{{asset('img/foto_perfil/8.jpg')}}" width="60">
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function()
                        {
                            $('#form-alterar-foto-agente').on('submit', function(event)
                            {
                                event.preventDefault();

                                jQuery.ajax(
                                    {
                                    url: "{{route('agente.alterar.foto')}}",
                                    data: jQuery('#form-alterar-foto-agente').serialize(),
                                    type: "PATCH",
                                    success:function(result)
                                    {
                                        jQuery('#form-alterar-foto-agente')[0].reset();
                                        $('#mensagem-alterar-foto-agente').html(result.mensagem);
                                    },
                                    error:function(xhr, status, error)
                                    {
                                        $('#mensagem-alterar-foto-agente').html(xhr.responseJSON.mensagem);
                                    }
                                })
                            })
                        })
                    </script>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="alterarSenha" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form-alterar-senha">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Alterar senha</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="apagarMensagem('mensagem-alterar-senha')"></button>
                </div>
                <div class="modal-body">
                    <div id="mensagem-alterar-senha">
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control border" type="password" id="senha-atual" name="old_password" size=50 required>
                        <label for="senha-atual">Senha atual</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control border" type="password" id="senha-nova" name="new_password" size=50 required>
                        <label for="senha-nova">Nova senha</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control border" type="password" id="senha-confirmar" name="new_password_confirm" size=50 required>
                        <label for="senha-confirmar">Confirmar nova senha</label>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function()
                        {
                            $('#form-alterar-senha').on('submit', function(event)
                            {
                                event.preventDefault();

                                jQuery.ajax(
                                    {
                                    url: "{{route('agente.alterar.senha')}}",
                                    data: jQuery('#form-alterar-senha').serialize(),
                                    type: "PATCH",
                                    success:function(result)
                                    {
                                        jQuery('#form-alterar-senha')[0].reset();
                                        $('#mensagem-alterar-senha').html(result.mensagem);
                                    },
                                    error:function(xhr, status, error)
                                    {
                                        $('#mensagem-alterar-senha').html(xhr.responseJSON.mensagem);
                                    }

                                })
                            })
                        })
                    </script>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="alterarNomeUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form-alterar-nome-usuario">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Alterar nome de usuário</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="apagarMensagem('mensagem-alterar-nome-usuario')"></button>
                </div>
                <div class="modal-body">
                    <div id="mensagem-alterar-nome-usuario">
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control border" type="text" id="username-atual" name="old_username" size=50 required>
                        <label for="username-atual">Nome de usuário atual</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control border" type="text" id="novo-username" name="new_username" size=50 required>
                        <label for="novo-username">Novo nome de usuário</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control border" type="text" id="username-confirmar" name="new_username_confirm" size=50 required>
                        <label for="username-confirmar">Confirmar nome de usuário</label>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function()
                        {
                            $('#form-alterar-nome-usuario').on('submit', function(event)
                            {
                                event.preventDefault();

                                jQuery.ajax(
                                    {
                                    url: "{{route('agente.alterar.username')}}",
                                    data: jQuery('#form-alterar-nome-usuario').serialize(),
                                    type: "PATCH",
                                    success:function(result)
                                    {
                                        jQuery('#form-alterar-nome-usuario')[0].reset();
                                        $('#mensagem-alterar-nome-usuario').html(result.mensagem);
                                    },
                                    error:function(xhr, status, error)
                                    {
                                        $('#mensagem-alterar-nome-usuario').html(xhr.responseJSON.mensagem);
                                    }

                                })
                            })
                        })
                    </script>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>