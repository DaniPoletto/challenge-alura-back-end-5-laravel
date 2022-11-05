<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiCategoriaTest extends TestCase
{
    public function testApiNaoDeveRetornarCategoriasSeNaoPassadoUmToken()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->get('/api/categorias');

        $response->assertUnauthorized();
    }

    public function testApiDeveRetornarCategoriasSePassadoUmToken()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')
            ->withHeaders([
                'Accept' => 'application/json'
            ])->get('/api/categorias');

        $response->assertOK();
    }

    public function testRotaDeCadastrarCategoriaDaApiDeveRetornarACategoriaCadastrada()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')
            ->withHeaders([
                'Accept' => 'application/json'
            ])->postJson('/api/categorias', [
                "titulo" => "Vue",
                "cor" => "#fffff"
            ]);

        $response->assertStatus(201)->assertJson([
            "titulo" => "Vue",
            "cor" => "#fffff"
        ]);
    }

    public function testApiNaoPermiteCadastroDeCategoriaSemCorETitulo()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')
            ->withHeaders([
                'Accept' => 'application/json'
            ])->postJson('/api/categorias');

        $response->assertJsonMissing(["cor", "titulo"]);
    }
}
