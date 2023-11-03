<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Movimiento_nomina;
use App\Models\Tipo_frecuencia;
use App\Models\Tipo_movimiento_nomina;

class DeduccionesBonificacionesController extends Controller
{

    public function create($id_empleado)
{
    $tiposFrecuencia = Tipo_frecuencia::all();
    $tiposMovimiento = Tipo_movimiento_nomina::all();
    return view('deduccionesbonificaciones.crear', [
        'tiposFrecuencia' => $tiposFrecuencia,
        'tiposMovimiento' => $tiposMovimiento,
        'id_empleado' => $id_empleado,
    ]);
}

public function store(Request $request)
{
    $request->validate([
        'concepto' => 'required',
        'valor_pagar' => 'required|numeric',
        'accion' => 'required',
        'observacion' => 'required',
    ]);

    $movimientoNomina = new Movimiento_nomina;
    $movimientoNomina->id_empleado = $request->input('id_empleado');
    $movimientoNomina->id_tipo_frecuencia = $request->input('id_tipo_frecuencia');
    $movimientoNomina->id_tipo_movimiento_nomina = $request->input('id_tipo_movimiento_nomina');
    $movimientoNomina->concepto = $request->input('concepto');
    $movimientoNomina->valor_pagar = $request->input('valor_pagar');
    $movimientoNomina->accion = $request->input('accion');
    $movimientoNomina->observacion = $request->input('observacion');

    $movimientoNomina->save();
    return redirect()->route('deduccionesbonificaciones.show', ['id_empleado' => $request->input('id_empleado')])->with('success', 'Movimiento de nómina agregado exitosamente.');

}


    //Funcion para mostrar los movimientos por empleado
    public function show($id)
    {
        $empleado = Empleado::where('id', $id)->first();
        $movimientosNomina = Movimiento_nomina::where('id_empleado', $id)->get();
        
        return view('deduccionesbonificaciones.index', compact('empleado','movimientosNomina'));
    }

    //Debo de traerme el id del empleado y el id del movimiento
    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
