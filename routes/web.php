<?php

use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PartidoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TorneoController;
use App\Http\Controllers\ExportacionController;

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
    return redirect()->route('torneos.index');
});


//Rutas para torneos
Route::resource('torneos', TorneoController::class);

//Rutas para Equipos
Route::resource('equipos', EquipoController::class);
Route::post('/equipos/storeBatch/{id}',[EquipoController::class,'storeBatch'])->name('equipos.storeBatch');

//Rutas para partidos
Route::post('/partidos/storeBatch/{id}',[PartidoController::class,'storeBatch'])->name('partidos.storeBatch');
Route::resource('partidos', PartidoController::class);

//RUtas para Exportacion
Route::get('/exportar',[ExportacionController::class,"index"])->name('partidos.exportar.index');
Route::post('/exportar/pdf',[ExportacionController::class,"exportarPartidosPDF"])->name('partidos.exportar.pdf');
Route::get('/exportar/csv',[ExportacionController::class,"exportarPartidosCSV"])->name('partidos.exportar.csv');