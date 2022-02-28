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
use App\Http\Controllers\SedeController;
use App\Http\Controllers\VisitaController;
use App\Mail\EmailAutorizacionesVisitas;
use App\Mail\ReportesAutorizacionesVisitas;
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
    /*
    ?Espacio para ruta de aprobaciones
    */
    Route::get('/aprobaciones', [VisitaController::class, 'aprobaciones'])->name('aprobaciones');
    Route::patch('/aprobaciones/{visita}/aprobar', [VisitaController::class, 'aprobar'])->name('aprobaciones.aprobar');
    Route::patch('/aprobaciones/{visita}/denegar', [VisitaController::class, 'denegar'])->name('aprobaciones.denegar');
    /*
    ?Para envio de correos
    */
    Route::get('/aprobaciones/emails', function () {

        return view('emails.EmailVisitas');

        /* $correo = new  EmailAutorizacionesVisitas;
        Mail::to('santiiiago4@gmail.com')->send($correo);

        return "Mensaje enviado"; */
    });
});
