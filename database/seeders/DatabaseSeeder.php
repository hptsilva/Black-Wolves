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

        // Inserir dados na tabela `agentes_perfils`
        DB::table('agentes_perfils')->insert([
            'id' => '1fdfa325-9559-4a34-9a93-b4f672ad7278',
            'fk_id_agente' => '056b9654-e5ad-4d22-aa5a-0c5bfc5ba9ea',
            'patente' => 'Tenente',
            'membro_desde' => '2023-01-01',
            'descricao' => 'Alguma coisa',
            'fk_foto_perfil' => '9088acf4-2847-4d61-a86b-a8012db869ae',
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
            // Adicione mais builds conforme necessário
        ]);

        // Inserir dados na tabela `fotos_perfils`
        DB::table('fotos_perfils')->insert([
            [
                'id' => '9088acf4-2847-4d61-a86b-a8012db869ae',
                'nome_arquivo' => '1.jpg',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            [
                'id' => 'f0c41b0e-6ab1-4f6e-878e-3fe4fc13adea',
                'nome_arquivo' => '2.jpg',
                'created_at' => '2024-05-09 10:17:18',
                'updated_at' => '2024-05-09 10:17:18',
            ],
            // Adicione mais fotos de perfil conforme necessário
        ]);

        // Inserir dados na tabela `screenshots`
        DB::table('screenshots')->insert([
            [
                'id' => '14798c9b-fed7-47e9-94f5-96d2121fb5d8',
                'nome_arquivo' => '3e5e5dda7f2ebd6a5e260d4e62e76d94.webp',
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
                'id' => 'be425dad-e00b-482f-93b0-3ef80f5000df',
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
