<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $id_agente = Str::uuid();

        $data_hora_atual = date('Y-m-d H:i:s');

        // Inserir dados na tabela `agentes`
        DB::table('agentes')->insert([
            'id' => $id_agente,
            'admin' => '1',
            'username' => 'admin',
            'nome_agente' => 'Admin',
            // password = 00000000
            // Altere a senha por questões de segurança
            'password' => '$2y$12$o1OGvzRmA3qm/M6w13n9Rum9NzFJIaczyqmY7A022DRbHt6atxtxK',
            'created_at' => $data_hora_atual,
            'updated_at' => $data_hora_atual,
        ]);

        // Inserir dados na tabela `fotos_perfils`
        DB::table('fotos_perfils')->insert([
            [
                'id' => 1,
                'nome_arquivo' => '0.jpg',
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => 2,
                'nome_arquivo' => '1.jpg',
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => 3,
                'nome_arquivo' => '2.jpg',
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => 4,
                'nome_arquivo' => '3.jpg',
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => 5,
                'nome_arquivo' => '4.jpg',
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => 6,
                'nome_arquivo' => '5.jpg',
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => 7,
                'nome_arquivo' => '6.jpg',
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => 8,
                'nome_arquivo' => '7.jpg',
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => 9,
                'nome_arquivo' => '8.jpg',
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ]
            // Adicione mais fotos de perfil conforme necessário
        ]);

        // Inserir dados na tabela `agentes_perfils`
        DB::table('agentes_perfils')->insert([
            'id' => 1,
            'fk_id_agente' => $id_agente,
            'patente' => 'Tenente',
            'membro_desde' => date('Y-m-d'),
            'descricao' => 'Alguma coisa',
            'fk_foto_perfil' => 1,
            'created_at' => $data_hora_atual,
            'updated_at' => $data_hora_atual,
        ]);

        // Inserir dados na tabela `builds`
        DB::table('builds')->insert([
            [
                'id' => Str::uuid(),
                'code' => '71a5f509637ef6554fab39f6896d8078',
                'fk_id_agente' => $id_agente,
                'nome_build' => 'Build do Agressor',
                'classe' => 'dps',
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'code' => '0c243e4b05e5887fce7e19aad3d5490d',
                'fk_id_agente' => $id_agente,
                'nome_build' => 'Tank do Fieser',
                'classe' => 'raid',
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'code' => '55afe8aa-22a6-46c2-9f75-897650a28315',
                'fk_id_agente' => $id_agente,
                'nome_build' => 'Build do Sniper #1',
                'classe' => 'dps',
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'code' => '1cef1a01a40487be713437e529e0aab0',
                'fk_id_agente' => $id_agente,
                'nome_build' => 'Fúria do Caçador #1',
                'classe' => 'dps',
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'code' => '093cad8f10068781cc0ccafdb6d82819',
                'fk_id_agente' => $id_agente,
                'nome_build' => 'Build do Médico #1',
                'classe' => 'gadget',
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'code' => '3d74e310-3a7f-4110-ba6c-046e076ea852',
                'fk_id_agente' => $id_agente,
                'nome_build' => 'Tank do Fieser #2',
                'classe' => 'raid',
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'code' => '49cc3654-826d-4b17-ade7-bf26a2312a23',
                'fk_id_agente' => $id_agente,
                'nome_build' => 'Builld do Pulso Bloqueador do Navalha',
                'classe' => 'raid',
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'code' => '752f4cc5-87f8-4d2b-b478-196f2e56f0ab',
                'fk_id_agente' => $id_agente,
                'nome_build' => 'Tank da Morozova',
                'classe' => 'raid',
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ]
            // Adicione mais builds conforme necessário
        ]);

        // Inserir dados na tabela `screenshots`
        DB::table('screenshots')->insert([
            [
                'id' => Str::uuid(),
                'nome_arquivo' => '1fd0436855adbc99a711e27582874790.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => '3e5e5dda7f2ebd6a5e260d4e62e76d94.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => '6b9e01760f76854eee2e200e62dc902d.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => '8b496cc6-18bb-4779-83af-cd9d64a0beeb.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => '8cc9b261c14d2d407aaa31dc6ce9cd9d.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => '8db628d39976b63aa8c8b072e295f2a2.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => '40aeea5328a432cad24931f9917167ed.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => '41e58abcd1e02655642601a4a369c018.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => '79ed270c51f0d9fb31eb6a22904cede0.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => '81dd48ac54c8f55e7b7a5b2aaa876469.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => '425d38f89038c1dd67dcfe87691d5527.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => '543f9acf-f142-4d52-a45c-a6b7ad029e37.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => '639b74bc5d305b0a6738adb7ca977d4a.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => '684ba9a3de643e4b8b1505f9fcf8f7e1.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => '57078ce2c5c0f3e76236325b7457ebeb.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => '71241740acdda93ef85b77e419c4cb03.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => 'a3ff4b65b7ff9df434f77c5a61a646e8.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => 'aa5bd8b2f1278b77a34f4c0e67de27bc.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => 'b2b554b9f181c815c32b61133f3e6d8e.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => 'b07ec94f94921e256d276c3675e0391f.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => 'b8a7a325ad5e9e076d2116a2d9d1534e.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => 'c02a99a2d91ccba52bb3fa7d4d22f56e.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => 'c3cca6ab35dde645c6d38102053f4e1e.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => 'e1d5a1eb179c86eb7aa8b64aa63389a3.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => 'c043047a-fa92-43fe-9a90-4d8c9b6a5a54.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => 'c99041d2c3aea2e1ee4d5958493f3db9.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => 'cb27d53dbe6600251b7cfd3e9c73abbd.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => 'ce8af3ef7ce4a0c338a91533880d9a9d.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => 'd7d05ea38b43ba8bd7bccd90aa26ffed.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => 'd90a23ee97be0acbac14b35fa6b462c8.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => 'd3574ebd-021f-411f-b447-4b598fd4182b.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => 'dd37d0798076bdec72c6f14a14ac3757.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => Str::uuid(),
                'nome_arquivo' => 'e00ecf11b54c48bb8d40d8e90c19c596.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => $id_agente,
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],


            // Adicione mais screenshots conforme necessário
        ]);

        // Inserir dados na tabela `token_autenticacoes`
        DB::table('token_autenticacoes')->insert([
            [
                'id' => 1,
                'token_uuid' => Str::uuid(),
                'usuario' => 'Admin',
                'usado' => 'SIM',
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            [
                'id' => 2,
                'token_uuid' => Str::uuid(),
                'usuario' => 'UserTest',
                'usado' => 'NÃO',
                'created_at' => $data_hora_atual,
                'updated_at' => $data_hora_atual,
            ],
            // Adicione mais tokens de autenticação conforme necessário
        ]);
    }
}
