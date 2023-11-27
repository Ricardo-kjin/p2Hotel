<?php

use App\Http\Controllers\RecepcionistaController;
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

//RUTA DE PAISES
Route::resource('paises', App\Http\Controllers\PaisController::class);

//RUTA DE provincia
Route::resource('provincias', App\Http\Controllers\ProvinciasController::class);

//RUTA DE recepcionistas
Route::resource('recepcionistas', RecepcionistaController::class);
Route::post('get-ciudades-provincias', [RecepcionistaController::class, 'getCiudadesProvincias'])->name('get-ciudades-provincias');

//RESERVAS FALTA LISTAR

Route::get('/reservas/create', [App\Http\Controllers\ReservasController::class, 'create']);
Route::post('/reservas/store', [App\Http\Controllers\ReservasController::class, 'store']);

//promociones
Route::get('/promociones', [App\Http\Controllers\PromocionController::class, 'index']);
Route::get('/promociones/create', [App\Http\Controllers\PromocionController::class, 'create']);
Route::post('/promociones', [App\Http\Controllers\PromocionController::class, 'store']);
Route::get('/promociones/{id}/edit', [App\Http\Controllers\PromocionController::class, 'edit']);
Route::put('/promociones/{id}', [App\Http\Controllers\PromocionController::class, 'update']);
Route::delete('/promociones/{id}', [App\Http\Controllers\PromocionController::class, 'destroy']);

//servicios
Route::get('/servicios', [App\Http\Controllers\ServiciosController::class, 'index']);
Route::get('/servicios/create', [App\Http\Controllers\ServiciosController::class, 'create']);
Route::post('/servicios', [App\Http\Controllers\ServiciosController::class, 'store']);
Route::get('/servicios/{id}/edit', [App\Http\Controllers\ServiciosController::class, 'edit']);
Route::put('/servicios/{id}', [App\Http\Controllers\ServiciosController::class, 'update']);
Route::delete('/servicios/{id}', [App\Http\Controllers\ServiciosController::class, 'destroy']);

//MS HABITACIONES-TIPO HABITACIONES
//tipo de habitaciones
Route::get('/tipos-habitacion', [App\Http\Controllers\TipoHabitacionController::class, 'index']);
Route::get('/tipos-habitacion/create', [App\Http\Controllers\TipoHabitacionController::class, 'create']);
Route::post('/tipos-habitacion', [App\Http\Controllers\TipoHabitacionController::class, 'store']);
Route::get('/tipos-habitacion/{id}/edit', [App\Http\Controllers\TipoHabitacionController::class, 'edit']);
Route::put('/tipos-habitacion/{id}', [App\Http\Controllers\TipoHabitacionController::class, 'update']);
Route::delete('/tipos-habitacion/{id}', [App\Http\Controllers\TipoHabitacionController::class, 'destroy']);

//habitaciones
Route::get('/habitaciones', [App\Http\Controllers\HabitacionController::class, 'index']);
Route::get('/habitaciones/create', [App\Http\Controllers\HabitacionController::class, 'create']);
Route::post('/habitaciones', [App\Http\Controllers\HabitacionController::class, 'store']);
Route::get('/habitaciones/{id}/edit', [App\Http\Controllers\HabitacionController::class, 'edit']);
Route::put('/habitaciones/{id}', [App\Http\Controllers\HabitacionController::class, 'update']);
Route::delete('/habitaciones/{id}', [App\Http\Controllers\HabitacionController::class, 'destroy']);

//imagenes
Route::get('/imagenes/create', [App\Http\Controllers\ImagenController::class, 'create']);
Route::post('/imagenes', [App\Http\Controllers\ImagenController::class, 'store']);












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
Route::get('/ubicaciones/{user_id}', [App\Http\Controllers\UbicacionController::class, 'create']);
Route::post('/ubicaciones', [App\Http\Controllers\UbicacionController::class, 'store']);
Route::get('/ubicaciones/{user_id}/edit', [App\Http\Controllers\UbicacionController::class, 'edit']);
Route::put('/ubicaciones/{ubicacion}', [App\Http\Controllers\UbicacionController::class, 'update']);

Route::get('/ubicaciones/vendedores/{user_id}', [App\Http\Controllers\UbicacionController::class, 'createv']);
Route::post('/ubicaciones/vendedores', [App\Http\Controllers\UbicacionController::class, 'storev']);
Route::get('/ubicaciones/vendedores/{user_id}/edit', [App\Http\Controllers\UbicacionController::class, 'editv']);
Route::put('/ubicaciones/vendedores/{ubicacion}', [App\Http\Controllers\UbicacionController::class, 'updatev']);

//Ruta
Route::get('/rutas', [App\Http\Controllers\RutaController::class, 'index']);
Route::get('/rutas/create', [App\Http\Controllers\RutaController::class, 'create']);
Route::get('/rutas/{ruta}/edit', [App\Http\Controllers\RutaController::class, 'edit']);
Route::post('/rutas', [App\Http\Controllers\RutaController::class, 'store']);
Route::put('/rutas/{ruta}', [App\Http\Controllers\RutaController::class, 'update']);
Route::delete('/rutas/{ruta}', [App\Http\Controllers\RutaController::class, 'destroy']);

//vendedores
Route::get('/vendedores', [App\Http\Controllers\VendedorController::class, 'index']);
Route::get('/vendedores/create', [App\Http\Controllers\VendedorController::class, 'create']);
Route::get('/vendedores/{vendedor}/edit', [App\Http\Controllers\VendedorController::class, 'edit']);
Route::post('/vendedores', [App\Http\Controllers\VendedorController::class, 'store']);
Route::put('/vendedores/{vendedor}', [App\Http\Controllers\VendedorController::class, 'update']);
Route::delete('/vendedores/{vendedor}', [App\Http\Controllers\VendedorController::class, 'destroy']);

//clientes
Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index']);
Route::get('/clientes/create', [App\Http\Controllers\ClienteController::class, 'create']);
Route::get('/clientes/{cliente}/edit', [App\Http\Controllers\ClienteController::class, 'edit']);
Route::post('/clientes', [App\Http\Controllers\ClienteController::class, 'store']);
Route::put('/clientes/{cliente}', [App\Http\Controllers\ClienteController::class, 'update']);
Route::delete('/clientes/{cliente}', [App\Http\Controllers\ClienteController::class, 'destroy']);

//personal monitoreo
Route::get('/monitores', [App\Http\Controllers\MonitorController::class, 'index']);
Route::get('/monitores/create', [App\Http\Controllers\MonitorController::class, 'create']);
Route::get('/monitores/{monitor}/edit', [App\Http\Controllers\MonitorController::class, 'edit']);
Route::post('/monitores', [App\Http\Controllers\MonitorController::class, 'store']);
Route::put('/monitores/{monitor}', [App\Http\Controllers\MonitorController::class, 'update']);
Route::delete('/monitores/{monitor}', [App\Http\Controllers\MonitorController::class, 'destroy']);

//tiemporeal
Route::get('/vermaps', [App\Http\Controllers\VermapController::class, 'index']);
Route::get('/vermaps/{id}', [App\Http\Controllers\VermapController::class, 'verUbicacionCompartida']);

//googlemaps
// Route::get('/mapa', 'MapaController@mostrarMapa');
Route::get('/mapa', [App\Http\Controllers\MapaController::class, 'mostrarMapa']);

//Reporte
Route::get('/reportesprom', [App\Http\Controllers\ReportesController::class, 'reportesprom']);




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
