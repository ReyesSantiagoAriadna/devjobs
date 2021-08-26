<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\NotificationsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//rutas protegidas
Route::group(['middleeare' => ['auth','verified']], function(){
    //rutas de vacantes
    Route::get('/vacantes', [VacanteController::class, 'index'])->name('vacantes.index');
    Route::get('/vacantes/create', [VacanteController::class, 'create'])->name('vacantes.create');
    Route::post('/vacantes', [VacanteController::class, 'store'])->name('vacantes.store');

    //subir imagenes
    Route::post('/vacantes/imagen', [VacanteController::class, 'imagen'])->name('vacantes.imagen');
    Route::post('/vacantes/borrarimagen', [VacanteController::class, 'dropImage'])->name('vacantes.borrar');

    //notificaciones 
    Route::get('/notificaciones', NotificationsController::class)->name('notificaciones');
});

//Enviar satos para la vacante
Route::post('/candidatos/store', [CandidatoController::class, 'store'])->name('candidatos.store');

//Muestra las vacantes sin autentificacion
Route::get('/vacantes/{vacante}', [VacanteController::class, 'show'])->name('vacantes.show');



