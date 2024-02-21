<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $autor = "Pablo Mateos";
        $curso = "23 / 24";
        $modulo = "DWES";

        $nivel = 2;

        $clientes = [
            [
                'id' => 1,
                'nombre' => 'Juan Marica'
            ],
            [
                'id' => 2,
                'nombre' => 'Juan Marica 2'
            ],
            [
                'id' => 3,
                'nombre' => 'Juan Mariquita'
            ],
            [
                'id' => 4,
                'nombre' => 'Wan Meryquita'
            ]
        ];

        $usuarios = [];

        return view('home.index', compact('autor', 'curso', 'modulo', 'nivel', 'clientes', 'usuarios'));

    }
}
