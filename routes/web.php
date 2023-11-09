<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NominaController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\PuestoController;
use App\Http\Controllers\HistoricoCambioSalarioController;
use App\Http\Controllers\ReporteCambioSalarioController;
use App\Http\Controllers\ReporteContratacionesController;
use App\Http\Controllers\DeduccionesBonificacionesController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ReporteMovimientosController;
use App\Http\Controllers\HistoricoTrabajoController;
use App\Http\Controllers\ReporteHorasController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::group(['middleware' => ['auth']], function() {

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
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

Route::get('nomina/editSalario/{id}', [HistoricoCambioSalarioController::class, 'edit'])->name('nomina.editSalario');
Route::patch('nomina/updateSalario/{id}', [HistoricoCambioSalarioController::class, 'update'])->name('nomina.updateSalario');
Route::get('nomina/editPuesto/{id}', [NominaController::class, 'editPuesto'])->name('nomina.editPuesto');
Route::patch('nomina/updatePuesto/{id}', [NominaController::class, 'updatePuesto'])->name('nomina.updatePuesto');
Route::get('get-municipios', [MunicipioController::class, 'getMunicipios'])->name('get-municipios');
Route::get('get-salario-puesto', [PuestoController::class, 'getSalarioPuesto'])->name('get-salario-puesto');
Route::get('reporte-contrataciones/{filtro?}', [ReporteContratacionesController::class, 'index'])->name('reporte-contrataciones');
Route::get('reporte-movimientos/{filtro?}', [ReporteMovimientosController::class, 'index'])->name('reporte-movimientos');

//Rutas de historico
//Route::resource('historicotrabajo', HistoricoTrabajoController::class);
Route::get('historicotrabajo/{id_empleado}', [HistoricoTrabajoController::class, 'show'])->name('historicotrabajo.show');
Route::get('historicotrabajo/{id_empleado_puesto}/create', [HistoricoTrabajoController::class, 'create'])->name('historicotrabajo.create');
Route::get('historicotrabajo/{id_empleado_puesto}/edit/{id_historico}', [HistoricoTrabajoController::class, 'edit'])->name('historicotrabajo.edit');
Route::post('historicotrabajo', [HistoricoTrabajoController::class, 'store'])->name('historicotrabajo.store');
Route::post('historicotrabajo/{id_historico}', [HistoricoTrabajoController::class, 'update'])->name('historicotrabajo.update');
Route::get('reporte-horas/{filtro?}', [ReporteHorasController::class, 'index'])->name('reporte-horas');


//Historico salario
Route::get('reporte-salario/{filtro?}', [ReporteCambioSalarioController::class, 'index'])->name('reporte-salarios');
Route::get('historicosalario/{id}', [HistoricoCambioSalarioController::class, 'show'])->name('historicosalario.show');
});