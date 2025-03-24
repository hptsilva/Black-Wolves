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
        // Inserir dados na tabela `agentes`
        DB::table('agentes')->insert([
            'id' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
            'admin' => '1',
            'username' => 'teste123',
            'nome_agente' => 'UserTeste',
            // password = 00000000
            'password' => '$2y$12$o1OGvzRmA3qm/M6w13n9Rum9NzFJIaczyqmY7A022DRbHt6atxtxK',
            'created_at' => '2024-05-14 14:48:08',
            'updated_at' => '2024-08-27 16:16:18',
        ]);

        // Inserir dados na tabela `fotos_perfils`
        DB::table('fotos_perfils')->insert([
            [
                'id' => 1,
                'nome_arquivo' => '0.jpg',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 2,
                'nome_arquivo' => '1.jpg',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 3,
                'nome_arquivo' => '2.jpg',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 4,
                'nome_arquivo' => '3.jpg',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 5,
                'nome_arquivo' => '4.jpg',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 6,
                'nome_arquivo' => '5.jpg',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 7,
                'nome_arquivo' => '6.jpg',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 8,
                'nome_arquivo' => '7.jpg',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 9,
                'nome_arquivo' => '8.jpg',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ]
            // Adicione mais fotos de perfil conforme necessário
        ]);

        // Inserir dados na tabela `agentes_perfils`
        DB::table('agentes_perfils')->insert([
            'id' => 1,
            'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
            'patente' => 'Tenente',
            'membro_desde' => '2023-01-01',
            'descricao' => 'Alguma coisa',
            'fk_foto_perfil' => 1,
            'created_at' => '2024-05-09 10:17:18',
            'updated_at' => '2025-01-17 20:16:15',
        ]);

        // Inserir dados na tabela `builds`
        DB::table('builds')->insert([
            [
                'id' => '1aaaabe7-6989-491e-b01f-c6cc6beb1995',
                'code' => '71a5f509637ef6554fab39f6896d8078',
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'nome_build' => 'Build do Agressor',
                'classe' => 'dps',
                'created_at' => '2024-04-24 11:41:10',
                'updated_at' => '2024-08-25 01:39:21',
            ],
            [
                'id' => '4531491c-b94d-482f-b3b4-047583ca7740',
                'code' => '0c243e4b05e5887fce7e19aad3d5490d',
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'nome_build' => 'Tank do Fieser',
                'classe' => 'raid',
                'created_at' => '2024-04-23 11:37:18',
                'updated_at' => '2024-04-23 11:37:18',
            ],
            [
                'id' => 'b1141d5f-7280-4ead-ac9f-82bac10db3cb',
                'code' => '55afe8aa-22a6-46c2-9f75-897650a28315',
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'nome_build' => 'Build do Sniper #1',
                'classe' => 'dps',
                'created_at' => '2024-04-23 11:37:18',
                'updated_at' => '2024-04-23 11:37:18',
            ],
            [
                'id' => 'c1994f8f-15e4-4b4f-8a83-dd1ccf2140c9',
                'code' => '1cef1a01a40487be713437e529e0aab0',
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'nome_build' => 'Fúria do Caçador #1',
                'classe' => 'dps',
                'created_at' => '2024-04-23 11:37:18',
                'updated_at' => '2024-04-23 11:37:18',
            ],
            [
                'id' => '9391839f-714d-4963-98fd-47e6e379e6b5',
                'code' => '093cad8f10068781cc0ccafdb6d82819',
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'nome_build' => 'Build do Médico #1',
                'classe' => 'gadget',
                'created_at' => '2024-04-23 11:37:18',
                'updated_at' => '2024-04-23 11:37:18',
            ],
            [
                'id' => '365ad500-980f-48cc-9a6f-e62b24996f9e',
                'code' => '3d74e310-3a7f-4110-ba6c-046e076ea852',
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'nome_build' => 'Tank do Fieser #2',
                'classe' => 'raid',
                'created_at' => '2024-04-23 11:37:18',
                'updated_at' => '2024-04-23 11:37:18',
            ],
            [
                'id' => 'f0379fca-d0bb-41d1-86ac-1fa0f1062461',
                'code' => '49cc3654-826d-4b17-ade7-bf26a2312a23',
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'nome_build' => 'Builld do Pulso Bloqueador do Navalha',
                'classe' => 'raid',
                'created_at' => '2024-04-23 11:37:18',
                'updated_at' => '2024-04-23 11:37:18',
            ],
            [
                'id' => 'e57b7991-b8bc-4ac9-92fd-da9553ceb56e',
                'code' => '752f4cc5-87f8-4d2b-b478-196f2e56f0ab',
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'nome_build' => 'Tank da Morozova',
                'classe' => 'raid',
                'created_at' => '2024-04-23 11:37:18',
                'updated_at' => '2024-04-23 11:37:18',
            ],
            [
                'id' => '9b572abd-469c-4168-aea2-6edf9f485411',
                'code' => '752f4cc5-87f8-4d2b-b478-196f2e56f0ab',
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'nome_build' => 'Tank da Morozova',
                'classe' => 'raid',
                'created_at' => '2024-04-23 11:37:18',
                'updated_at' => '2024-04-23 11:37:18',
            ]
            // Adicione mais builds conforme necessário
        ]);

        // Inserir dados na tabela `screenshots`
        DB::table('screenshots')->insert([
            [
                'id' => 1,
                'nome_arquivo' => '1fd0436855adbc99a711e27582874790.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 2,
                'nome_arquivo' => '3e5e5dda7f2ebd6a5e260d4e62e76d94.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 3,
                'nome_arquivo' => '6b9e01760f76854eee2e200e62dc902d.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 4,
                'nome_arquivo' => '8b496cc6-18bb-4779-83af-cd9d64a0beeb.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 5,
                'nome_arquivo' => '8cc9b261c14d2d407aaa31dc6ce9cd9d.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 6,
                'nome_arquivo' => '8db628d39976b63aa8c8b072e295f2a2.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 7,
                'nome_arquivo' => '40aeea5328a432cad24931f9917167ed.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 9,
                'nome_arquivo' => '41e58abcd1e02655642601a4a369c018.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 10,
                'nome_arquivo' => '79ed270c51f0d9fb31eb6a22904cede0.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 11,
                'nome_arquivo' => '81dd48ac54c8f55e7b7a5b2aaa876469.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 12,
                'nome_arquivo' => '425d38f89038c1dd67dcfe87691d5527.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 13,
                'nome_arquivo' => '543f9acf-f142-4d52-a45c-a6b7ad029e37.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 14,
                'nome_arquivo' => '639b74bc5d305b0a6738adb7ca977d4a.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 15,
                'nome_arquivo' => '684ba9a3de643e4b8b1505f9fcf8f7e1.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 16,
                'nome_arquivo' => '57078ce2c5c0f3e76236325b7457ebeb.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 17,
                'nome_arquivo' => '71241740acdda93ef85b77e419c4cb03.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 18,
                'nome_arquivo' => 'a3ff4b65b7ff9df434f77c5a61a646e8.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 19,
                'nome_arquivo' => 'aa5bd8b2f1278b77a34f4c0e67de27bc.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 20,
                'nome_arquivo' => 'b2b554b9f181c815c32b61133f3e6d8e.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 21,
                'nome_arquivo' => 'b07ec94f94921e256d276c3675e0391f.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 22,
                'nome_arquivo' => 'b8a7a325ad5e9e076d2116a2d9d1534e.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 23,
                'nome_arquivo' => 'c02a99a2d91ccba52bb3fa7d4d22f56e.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 24,
                'nome_arquivo' => 'c3cca6ab35dde645c6d38102053f4e1e.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 25,
                'nome_arquivo' => 'e1d5a1eb179c86eb7aa8b64aa63389a3.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 26,
                'nome_arquivo' => 'c043047a-fa92-43fe-9a90-4d8c9b6a5a54.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 27,
                'nome_arquivo' => 'c99041d2c3aea2e1ee4d5958493f3db9.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 28,
                'nome_arquivo' => 'cb27d53dbe6600251b7cfd3e9c73abbd.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 29,
                'nome_arquivo' => 'ce8af3ef7ce4a0c338a91533880d9a9d.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 30,
                'nome_arquivo' => 'd7d05ea38b43ba8bd7bccd90aa26ffed.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 31,
                'nome_arquivo' => 'd90a23ee97be0acbac14b35fa6b462c8.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 32,
                'nome_arquivo' => 'd3574ebd-021f-411f-b447-4b598fd4182b.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 33,
                'nome_arquivo' => 'dd37d0798076bdec72c6f14a14ac3757.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 34,
                'nome_arquivo' => 'e00ecf11b54c48bb8d40d8e90c19c596.webp',
                'titulo' => 'Sem título',
                'thumbnail' => NULL,
                'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],


            // Adicione mais screenshots conforme necessário
        ]);

        // Inserir dados na tabela `token_autenticacoes`
        DB::table('token_autenticacoes')->insert([
            [
                'id' => 1,
                'token_uuid' => 'cb7c724a-67bf-43a4-998c-fe14cb8d6697',
                'usuario' => 'UserTeste',
                'usado' => 'SIM',
                'created_at' => '2024-03-24 11:15:36',
                'updated_at' => '2024-05-14 14:48:08',
            ],
            // Adicione mais tokens de autenticação conforme necessário
        ]);
    }
}
