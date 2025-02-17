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

Route::get('/clients', function () {
    return 'Hola Clientes!!';
});

Route::get('/clients/delete', function () {
    return 'Eliminar clientes';
});

Route::get('/clients/edit/{id}', function ($id) {
    return "Editar detalles del cliente {$id}";
});

Route::get('/clients/show/{id}', function ($id) {
    return "Detalles del cliente {$id}";
});

Route::get('/clients/new', function () {
    return 'Nuevo cliente';
});

Route::get('/clients/delete/{id1}/{id2?}', function ($id1, $id2 = null) {
    if ($id2) {
        return "Eliminar clientes: {$id1} hasta el  {$id2}";
    } else {
        return "Eliminar cliente: {$id1}";
    }
});