<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientesController;

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

Route::controller(ClientesController::class)->group(function () {
    Route::get('/clientes', 'index');
    Route::get('/clientes/create', 'create');
    Route::get('/clientes/show/{id}', 'show');
    Route::get('/clientes/update/{id}', 'update');
    Route::get('/clientes/delete/{id}', 'delete');
});