<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return '| Pablo Mateos Palas | DAW | 2º | Prueba |';
});

Route::get('/api/user', function () {
    return 'En este grado aprenderemos a crear aplicacione web.';
});

Route::get('/user/{nombre}/{apellido1}/{apellido2}', function ($nombre, $apellido1, $apellido2) {
    return "Nombre: {$nombre} {$apellido1} {$apellido2}";
});

Route::get('/user/view/{id?}', function ($id = null) {
    if (!$id) {
        return "Mostrando detalle del usuario con id {$id}.";
    } else {
        return "Ningún usuario elegido";
    }
});

Route::get('/user/count/{id1}/{id2?}', function ($id1, $id2 = null) {
    if ($id2) {
        return "Clientes: {$id1} hasta el {$id2} elegidos";
    } else {
        return "Cliente: {$id1} elegido";
    }
});
