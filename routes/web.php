<?php

use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PartidoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TorneoController;

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

Route::get('/partidos/exportar/pdf',[PartidoController::class,"crearPDF"])->name('partidos.exportar.pdf');

Route::resource('torneos', TorneoController::class);

Route::resource('equipos', EquipoController::class);

Route::resource('partidos', PartidoController::class);
