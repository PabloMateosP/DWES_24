<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientesController extends Controller
{

    public function index()
    {
        return 'Lista Clientes';
    }

    public function create()
    {
        return 'Cliente Creado';
    }

    public function show($id)
    {
        return "Mostrar Clientes {$id}";
    }

    public function update($id)
    {
        return "Editar Cliente: {$id}";
    }

    public function delete($id)
    {
        return "Borrar Cliente: {$id}";
    }

}