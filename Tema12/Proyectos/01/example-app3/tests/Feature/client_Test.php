<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class client_Test extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {

        $response = $this->get('/client/edit/5');
        $response->assertStatus(200);
        $response->assertSee('Editar detalles del cliente 5');
        // Debe de estar igual al método edit 
        
    }
}
