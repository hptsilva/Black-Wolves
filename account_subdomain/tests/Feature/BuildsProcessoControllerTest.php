<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\Request;
use App\Models\Builds; // Supondo que Builds seja um modelo Eloquent
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;

class BuildsProcessoControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Configuração inicial, se necessário
    }

    public function testExcluirBuildComSucesso()
    {
        // Configura a sessão
        Session::put('id', 1);

        // Cria uma build no banco de dados para teste
        $build = Builds::factory()->create([
            'fk_id_agente' => '9e767a22-e19d-491a-8874-f5c666bb0c71',
            'classe' => 'dps',
            'code' => '093cad8f10068781cc0ccafdb6d82888',
            'nome_build' => 'Build de Teste'
        ]);

        // Cria uma instância do controller
        $controller = new \App\Http\Controllers\BuildsProcessoController();

        // Chama o método excluir
        $response = $controller->excluir(new Request(), $build->id);

        // Verifica se a resposta é a esperada
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getContent());
        $this->assertJsonStringEqualsJsonString(
            json_encode(['sucesso' => true, 'mensagem' => 'Build excluída com sucesso']),
            $response->getContent()
        );

        // Verifica se a build foi realmente excluída
        $this->assertNull(Builds::find($build->id));
    }

    public function testExcluirBuildNaoEncontrada()
    {
        // Configura a sessão
        Session::put('id', 1);

        // ID de uma build que não existe
        $idInexistente = 999;

        // Cria uma instância do controller
        $controller = new \App\Http\Controllers\BuildsProcessoController();

        // Chama o método excluir
        $response = $controller->excluir(new Request(), $idInexistente);

        // Verifica se a resposta é a esperada
        $this->assertEquals(404, $response->getStatusCode());
        $this->assertJson($response->getContent());
        $this->assertJsonStringEqualsJsonString(
            json_encode(['sucesso' => false, 'mensagem' => 'Build não encontrada']),
            $response->getContent()
        );
    }
}
