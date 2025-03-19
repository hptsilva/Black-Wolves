<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Administrador | Black Wolves</title>
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        @vite(['resources/scss/estilo_admin.scss'])
        <meta name="robots" content="noindex">
    </head>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        function confirmButton(){
            return confirm('Pressione OK para confirmar:');
        }

        function recarregarPagina(){
            window.location.reload();
        }

        window.addEventListener("load", function()
                {
                    jQuery.ajax({
                        url: "{{route('admin')}}",
                        dataType: "json",
                        type: "GET",
                    success:function(result){
                        const jsonData = result.agentes;
                        const tableBody = document.getElementById('tabela-agentes');
                        tamanho = jsonData.length;

                        for(var i=0; i < tamanho; i++ ){
                            const row = tableBody.insertRow();
                            const IdCell = row.insertCell();
                            const nomeCell = row.insertCell();
                            const criadoEmCell = row.insertCell();
                            const opcoesCell = row.insertCell();

                            IdCell.textContent = jsonData[i].id;
                            nomeCell.textContent = jsonData[i].nome_agente;
                            criadoEmCell.textContent = jsonData[i].created_at;
                            var button_excluir = document.createElement("BUTTON");
                            button_excluir.innerHTML = "Excluir";
                            button_excluir.className = "btn btn-primary m-1";
                            button_excluir.id = jsonData[i].id;
                            button_excluir.setAttribute("onclick", "deletarConta(\"" + jsonData[i].id +"\")")
                            opcoesCell.appendChild(button_excluir);
                            var button_reset = document.createElement("BUTTON");
                            button_reset.innerHTML = "Resetar";
                            button_reset.className = "btn btn-primary m-1";
                            button_reset.id = jsonData[i].id;
                            button_reset.setAttribute("onclick", "resetarConta(\"" + jsonData[i].id +"\")")
                            opcoesCell.appendChild(button_reset);
                        }
                    },
                    error:function(xhr, status, error){
                        console.log('Não foi possível carreggar a tabela');
                    }})
            });
        
        function deletarConta(id){

            var confirm = confirmButton();
            if (confirm == false){
                return;
            }
            jQuery.ajax({
                url: "{{env('PRINCIPAL_DOMAIN')}}" + id,
                dataType: "json",
                type: "DELETE",
            success:function(result){
                alert(result.mensagem);
                window.location.reload();
            },
            error:function(xhr, status, error){
                alert('Não foi possível excluir a conta');
            }})
        }

        function resetarConta(id){

            var confirm = confirmButton();
            if (confirm == false){
                return;
            }
            jQuery.ajax({
                url: "{{env('ACCOUNT_SUBDOMAIN')}}" + "/api/admin/contas/resetar/" + id,
                dataType: "json",
                type: "PATCH",
            success:function(result){
                alert(result.mensagem);
                window.location.reload();
            },
            error:function(xhr, status, error){
                alert('Não foi possível resetar a conta');
            }})
        }
    </script>
    <body>
        <?php
        if(isset($_SESSION['autenticado'])){?>
            @include('imports.header')
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
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">
                            <form method="POST" action="{{route('signout')}}">
                                @csrf
                                <button type="submit" class="sair">Sair</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <main class="container mb-5">
                <div class="titulo mt-3 mb-5">
                    <h1>ADMINISTRADOR | Gerenciar Contas</h1>
                </div>
                <section>
                    <button class="btn btn-primary mb-2 op-button" onclick="recarregarPagina()">&orarr;</button>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID:</th>
                                <th scope="col">Nome:</th>
                                <th scope="col">Criado em:</th>
                                <th scope="col">Opções</th>
                            </tr>
                        </thead>
                        <tbody id="tabela-agentes">
                        </tbody>
                    </table>
                </section>
            </main>
            <div id="btn">
            </div>
        <?php
        }?>
        @include('imports.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>