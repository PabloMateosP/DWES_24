<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class rutaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/test');
        $response->assertStatus(200);
        $response->assertSee('| Pablo Mateos Palas | DAW | 2º | Prueba ');
    }
    public function test_example_api_user(): void
    {
        $response = $this->get('/api/user');
        $response->assertStatus(200);
        $response->assertSee('En este grado aprenderemos a crear aplicacione web.');
    }
    public function test_example_user_nombreApe(): void
    {
        $response = $this->get('/user/Pablo/Mateos/Palas');
        $response->assertStatus(200);
        $response->assertSee('Nombre: Pablo Mateos Palas');
    }
    public function test_example_view_idDouble(): void
    {
        $response = $this->get('/user/count/1');
        $response->assertStatus(200);
        $response->assertSee('Mostrando detalle del usuario con id 1.');
    }
    public function test_example_view_id(): void
    {
        $response = $this->get('/user/count/1/2');
        $response->assertStatus(200);
        $response->assertSee('Clientes: 1 hasta el 2 elegidos');
    }
    
}
