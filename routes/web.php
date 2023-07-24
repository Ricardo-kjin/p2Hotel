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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Familia
Route::get('/familias', [App\Http\Controllers\FamiliaController::class, 'index']);
Route::get('/familias/create', [App\Http\Controllers\FamiliaController::class, 'create']);
Route::get('/familias/{familia}/edit', [App\Http\Controllers\FamiliaController::class, 'edit']);
Route::post('/familias', [App\Http\Controllers\FamiliaController::class, 'store']);
Route::put('/familias/{familia}', [App\Http\Controllers\FamiliaController::class, 'update']);
Route::delete('/familias/{familia}', [App\Http\Controllers\FamiliaController::class, 'destroy']);

//Grupo
Route::get('/grupos', [App\Http\Controllers\GrupoController::class, 'index']);
Route::get('/grupos/create', [App\Http\Controllers\GrupoController::class, 'create']);
Route::get('/grupos/{grupo}/edit', [App\Http\Controllers\GrupoController::class, 'edit']);
Route::post('/grupos', [App\Http\Controllers\GrupoController::class, 'store']);
Route::put('/grupos/{grupo}', [App\Http\Controllers\GrupoController::class, 'update']);
Route::delete('/grupos/{grupo}', [App\Http\Controllers\GrupoController::class, 'destroy']);
//SubGrupo
Route::get('/subgrupos', [App\Http\Controllers\SubgrupoController::class, 'index']);
Route::get('/subgrupos/create', [App\Http\Controllers\SubgrupoController::class, 'create']);
Route::get('/subgrupos/{subgrupo}/edit', [App\Http\Controllers\SubgrupoController::class, 'edit']);
Route::post('/subgrupos', [App\Http\Controllers\SubgrupoController::class, 'store']);
Route::put('/subgrupos/{subgrupo}', [App\Http\Controllers\SubgrupoController::class, 'update']);
Route::delete('/subgrupos/{subgrupo}', [App\Http\Controllers\SubgrupoController::class, 'destroy']);
//Producto
Route::get('/productos', [App\Http\Controllers\ProductoController::class, 'index']);
Route::get('/productos/create', [App\Http\Controllers\ProductoController::class, 'create']);
Route::get('/productos/{producto}/edit', [App\Http\Controllers\ProductoController::class, 'edit']);
Route::post('/productos', [App\Http\Controllers\ProductoController::class, 'store']);
Route::put('/productos/{producto}', [App\Http\Controllers\ProductoController::class, 'update']);
Route::delete('/productos/{producto}', [App\Http\Controllers\ProductoController::class, 'destroy']);
//Ruta

//Ubicacion

//TiempoRuta

//vendedores
Route::get('/vendedores', [App\Http\Controllers\VendedorController::class, 'index']);
Route::get('/vendedores/create', [App\Http\Controllers\VendedorController::class, 'create']);
Route::get('/vendedores/{vendedor}/edit', [App\Http\Controllers\VendedorController::class, 'edit']);
Route::post('/vendedores', [App\Http\Controllers\VendedorController::class, 'store']);
Route::put('/vendedores/{vendedor}', [App\Http\Controllers\VendedorController::class, 'update']);
Route::delete('/vendedores/{vendedor}', [App\Http\Controllers\VendedorController::class, 'destroy']);

//clientes

//personal monitoreo
Route::get('/monitores', [App\Http\Controllers\MonitorController::class, 'index']);
Route::get('/monitores/create', [App\Http\Controllers\MonitorController::class, 'create']);
Route::get('/monitores/{monitor}/edit', [App\Http\Controllers\MonitorController::class, 'edit']);
Route::post('/monitores', [App\Http\Controllers\MonitorController::class, 'store']);
Route::put('/monitores/{monitor}', [App\Http\Controllers\MonitorController::class, 'update']);
Route::delete('/monitores/{monitor}', [App\Http\Controllers\MonitorController::class, 'destroy']);










//salas
// Route::get('/salas', [App\Http\Controllers\SalasController::class, 'index']);
// Route::get('/salas/create', [App\Http\Controllers\SalasController::class, 'create']);
// Route::get('/salas/{sala}/edit', [App\Http\Controllers\SalasController::class, 'edit']);
// Route::post('/salas', [App\Http\Controllers\SalasController::class, 'store']);
// Route::put('/salas/{sala}', [App\Http\Controllers\SalasController::class, 'update']);
// Route::delete('/salas/{sala}', [App\Http\Controllers\SalasController::class, 'destroy']);
//Desarrolladores

// Route::resource('desarrolladores', 'App\Http\Controllers\DesarrolladorController');
// Route::get('/desarrolladores', [App\Http\Controllers\DesarrolladorController::class, 'index']);
// Route::get('/desarrolladores/create', [App\Http\Controllers\DesarrolladorController::class, 'create']);
// Route::get('/desarrolladores/{desarrollador}/edit', [App\Http\Controllers\DesarrolladorController::class, 'edit']);
// Route::post('/desarrolladores', [App\Http\Controllers\DesarrolladorController::class, 'store']);
// Route::put('/desarrolladores/{desarrollador}', [App\Http\Controllers\DesarrolladorController::class, 'update']);
// Route::delete('/desarrolladores/{desarrollador}', [App\Http\Controllers\DesarrolladorController::class, 'destroy']);
