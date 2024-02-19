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

Route::get('/client', function () {
    return 'Clientes';
});

Route::get('/client/delete', function () {
    return 'Eliminar clientes';
});

Route::get('/client/edit/{id}', function ($id) {
    return "Editar detalles del cliente {$id}";
});

Route::get('/client/show/{id}', function ($id) {
    return "Detalles del cliente {$id}";
});

Route::get('/client/new', function () {
    return 'Nuevo cliente';
});

Route::get('/client/delete/{id1}/{id2?}', function ($id1, $id2 = null) {
    if ($id2) {
        return "Eliminar clientes: {$id1} hasta el  {$id2}";
    } else {
        return "Eliminar cliente: {$id1}";
    }
});