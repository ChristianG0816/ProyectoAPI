<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimiento_nomina;
use App\Models\Tipo_movimiento_nomina;
use App\Models\Tipo_frecuencia;

class ReporteMovimientosController extends Controller
{
    public function index(Request $request){
        // Obtener los parámetros de filtrado del formulario
        $id_tipo_frecuencia = $request->input('id_tipo_frecuencia');
        $id_tipo_movimiento_nomina = $request->input('id_tipo_movimiento_nomina');

        // Construir la consulta de base de datos con los filtros
        $query = Movimiento_nomina::query();

        if (!is_null($id_tipo_frecuencia)) {
            $query->where('id_tipo_frecuencia', $id_tipo_frecuencia);
        }

        if (!is_null($id_tipo_movimiento_nomina)) {
            $query->where('id_tipo_movimiento_nomina', $id_tipo_movimiento_nomina);
        }

        // Ejecutar la consulta y obtener los resultados
        $movimientoNomina = $query->get();

        // Cargar los tipos de frecuencia y tipos de movimiento
        $tiposFrecuencia = Tipo_frecuencia::all();
        $tiposMovimiento = Tipo_movimiento_nomina::all();

        return view('reportes.movimientos', compact('movimientoNomina', 'tiposFrecuencia', 'tiposMovimiento'));
    }
}

