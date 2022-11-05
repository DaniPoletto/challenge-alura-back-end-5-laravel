<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiVideoTest extends TestCase
{
    public function testApiNaoDeveRetornarVideosSeNaoPassadoUmToken()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])->get('/api/videos');

        $response->assertUnauthorized();;
    }

    public function testApiDeveRetornarVideosSePassadoUmToken()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')
            ->withSession(['banned' => false])
            ->withHeaders([
                'Accept' => 'application/json'
            ])->get('/api/videos');

        $response->assertOK();
    }
}
