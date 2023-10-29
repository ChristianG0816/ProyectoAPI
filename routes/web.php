<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NominaController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\PuestoController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource("nomina", NominaController::class)->names('nomina');
Route::get('get-municipios', [MunicipioController::class, 'getMunicipios'])->name('get-municipios');
Route::get('get-salario-puesto', [PuestoController::class, 'getSalarioPuesto'])->name('get-salario-puesto');
