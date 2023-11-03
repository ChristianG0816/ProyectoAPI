<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NominaController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\ReporteContratacionesController;
use App\Http\Controllers\DeduccionesBonificacionesController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;

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

Route::group(['middleware' => ['auth']], function() {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource("nomina", NominaController::class)->names('nomina');
Route::get('deduccionesbonificaciones/{id_empleado}', [DeduccionesBonificacionesController::class, 'show'])->name('deduccionesbonificaciones.show');
Route::get('deduccionesbonificaciones/{id_empleado}/create', [DeduccionesBonificacionesController::class, 'create'])->name('deduccionesbonificaciones.create');
Route::post('deduccionesbonificaciones', [DeduccionesBonificacionesController::class, 'store'])->name('deduccionesbonificaciones.store');
Route::get('deduccionesbonificaciones/{id_empleado}/edit/{id_movimiento}', [DeduccionesBonificacionesController::class, 'edit'])->name('deduccionesbonificaciones.edit');
Route::post('deduccionesbonificaciones/{id_empleado}/{id_movimiento}', [DeduccionesBonificacionesController::class, 'update'])->name('deduccionesbonificaciones.update');

//Rutas para seguridad
Route::get('roles/data', [RolController::class, 'data'])->name('roles.data');
Route::resource('roles', RolController::class);
Route::get('usuarios/data', [UsuarioController::class, 'data'])->name('usuarios.data');
Route::resource('usuarios', UsuarioController::class);

Route::get('nomina/editPuesto/{id}', [NominaController::class, 'editPuesto'])->name('nomina.editPuesto');
Route::patch('nomina/updatePuesto/{id}', [NominaController::class, 'updatePuesto'])->name('nomina.updatePuesto');
Route::get('get-municipios', [MunicipioController::class, 'getMunicipios'])->name('get-municipios');
Route::get('get-salario-puesto', [PuestoController::class, 'getSalarioPuesto'])->name('get-salario-puesto');
Route::get('reporte-contrataciones/{filtro?}', [ReporteContratacionesController::class, 'index'])->name('reporte-contrataciones');

});