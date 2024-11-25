<?php

use App\Http\Controllers\AreaController;
use Illuminate\Support\Facades\Route;
//Agregamos controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\CarnetController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\RecepcionProveedoreController;
use App\Http\Controllers\RecepcionVisitanteController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\VisitaController;
use App\Mail\EmailAutorizacionesVisitas;
use App\Mail\ReportesAutorizacionesVisitas;
use App\Models\RecepcionVisitante;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Nuevas rutas
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('documentos', DocumentoController::class);
    Route::resource('estados', EstadoController::class);
    Route::resource('sedes', SedeController::class);
    Route::resource('carnets', CarnetController::class);
    Route::resource('areas', AreaController::class);
    Route::resource('cargos', CargoController::class);
    Route::resource('visitas', VisitaController::class);
    Route::resource('recepcion-visitas', RecepcionVisitanteController::class);
    Route::resource('recepcion-proveedores', RecepcionProveedoreController::class);
    /*
    ?Espacio para ruta de aprobaciones
    */
    Route::get('/aprobaciones', [VisitaController::class, 'aprobaciones'])->name('aprobaciones');
    Route::patch('/aprobaciones/{visita}/aprobar', [VisitaController::class, 'aprobarVisita'])->name('aprobaciones.aprobar');
    Route::patch('/aprobaciones/{visita}/denegar', [VisitaController::class, 'denegarVisita'])->name('aprobaciones.denegar');
    /*
    ?Para recepcion de visitas
    */
    Route::get('/recepcion-visitas/{recepcion_visita}/create', [RecepcionVisitanteController::class, 'createRecepcionVisita'])->name('recepcion-visitas.createRecepcion');
    Route::patch('/recepcion-visitas/{recepcion_visita}/salida', [RecepcionVisitanteController::class, 'salidaVisitante'])->name('recepcion-visitas.salida');
    /*
    ?Para recepcion de proveedores
    */
    Route::patch('/recepcion-proveedores/{recepcion_proveedor}/salida', [RecepcionProveedoreController::class, 'salidaProveedor'])->name('recepcion-proveedores.salida');

    Route::get('correos/{visita}', [VisitaController::class, 'showAprobaciones'])->name('aprobaciones.correo');
});
