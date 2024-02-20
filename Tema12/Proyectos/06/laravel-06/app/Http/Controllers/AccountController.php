<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function index()
    {
        return 'Indice';
    }

    public function create()
    {
        return 'Cuenta Creada';
    }

    public function store()
    {
        return 'Almacenar Cuenta';
    }

    public function show(string $id)
    {
        return "Mostrando cuenta: {$id}";
    }

    public function edit(string $id)
    {
        return  "Editar cuenta: {$id}";
    }

    public function update(string $id)
    {
        return "Actualizar cuenta: {$id}";
    }

    public function destroy(string $id)
    {
        return "Eliminar cuenta: {$id}";
    }
}
