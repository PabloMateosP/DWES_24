<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientController;
use App\Http\Controllers\AcountController;

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

// --------------------------------------------------------------------- //
// Vinculamos cada ruta con un método del controlador
// Route::get('/clientes', [ClientController::class, 'index']);
// // Create
// Route::get('/clientes/create', [ClientController::class, 'create']);
// // Show
// Route::get('/clientes/show/{id}', [ClientController::class, 'show']);
// // Edit
// Route::get('/clientes/edit/{id}', [ClientController::class, 'edit']);
// --------------------------------------------------------------------- //

// --------------------------------------------------------------------- //
// Podemos agrupar las rutas que pertenecen a un mismo controlador
Route::controller(ClientController::class)->group(function () {
    Route::get('/clientes', 'index');
    Route::get('/clientes/create', 'create');
    Route::get('/clientes/show/{id}', 'show');
    Route::get('/clientes/edit/{id}', 'edit');
});


// ---------------------------------------------------------------------- //
// Generamos las rutas de la clase Account con resource
// Para que esto funcione, el controlador debe ser creado mediante el comando: 
// php artisan make:controller AcountController --resource
Route::resource('/cuentas', AcountController::class); 