<section>
    <div id="perfil">
        <div class="container mt-4">
            <div class="row justify-content-start">
                <div class="col-md-8">
                    <?php
                        $fotos_perfil = new App\Models\FotosPerfil();
                        $foto = $fotos_perfil->where('id', '=', $_SESSION['id_foto_de_perfil'])->get()->first();
                    ?>
                    <div class="text-start" id="foto-perfil">
                        <img class="polaroid" src="{{asset('img/foto_perfil/'.$foto->nome_arquivo)}}" width="250">
                    </div>
                    <h1>Agente {{$_SESSION['nome']}}</h1>
                    <div class="perfil-descricao text-start">
                        <p><strong>Status: </strong>SHD</p>
                        <p><strong>Patente: </strong>{{$_SESSION['patente']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>