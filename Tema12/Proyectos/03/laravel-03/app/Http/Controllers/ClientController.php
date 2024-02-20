<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Para crear este controlador se debe de hacer mediante el siguiente comando:
// php artisan make:controller ClientController
class ClientController extends Controller
{
    // Mostrar los clientes 
    public function index(){
        return 'Lista Clientes';
    }

    public function create(){
        return 'Cliente Creado';
    }

    public function show($id){
        return "Mostrar Clientes {$id}";
    }

    public function edit($id){
        return "Editar Cliente: {$id}";
    }
}