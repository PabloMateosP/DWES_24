<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class test_ejemplo_Test extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {

        $response = $this->get('/client');
        $response->assertStatus(200);
        $response->assertSee('Clientes');
        // Las clases deben de llamarse SIEMPRE ...Test
        // Se debe de hacer el comando --> Vendor/bin/phpunit
        
    }
}