<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoricoCambioSalario;
use App\Models\Empleado;
use App\Models\EmpleadoPuesto;
use App\Models\Puesto;

class HistoricoCambioSalarioController extends Controller
{
    public function show($id)
    {
        $empleado = Empleado::where('id', $id)->first();
        $empleadoPuesto = EmpleadoPuesto::where('id_empleado', $id)->first();
        $historicoSalarios = HistoricoCambioSalario::where('id_empleado_puesto', $empleadoPuesto->id_empleado)->orderBy('fecha_cambio_salario', 'desc')->get();
        
        return view('historicosalario.index', compact('empleado','empleadoPuesto','historicoSalarios'));
    }
    
    public function edit($id)
    {
        $empleadoPuesto = EmpleadoPuesto::where('id', $id)->first();
        return view('historicosalario.edit', compact('empleadoPuesto'));
    }

    public function update(Request $request, $id)
    {
        $empleadoPuesto = EmpleadoPuesto::where('id', $id)->first();
        $fecha_minima = '1900-01-01'; // Cambia esta fecha según tus necesidades
        $salarioAnterior = $empleadoPuesto->salario_mensual;
        try {
            //guardar solo el valor del salario en la variable
            $salarioBase = Puesto::where('id', $empleadoPuesto->id_puesto)->pluck('salario_mensual_base')->first();
            if ($salarioBase == null) {
                $salarioBase = 0;
            }
        } catch (\Throwable $th) {
            $salarioBase = 0;
        }
        $request->validate([
            'salario_nuevo' => 'required|numeric|min:' . $salarioBase,
            'fecha_cambio_salario' => 'required|date|after_or_equal:' . $fecha_minima,
        ],
        [
            'fecha_cambio_salario.after_or_equal' => 'La fecha de cambio de salario debe ser igual o posterior a ' . $fecha_minima,
            'salario_nuevo.min' => 'El salario nuevo no puede ser menor que el salario base del puesto.',
        ]);
        EmpleadoPuesto::where('id', $empleadoPuesto->id)->update([
            'salario_mensual' => $request->salario_nuevo,
        ]);
        HistoricoCambioSalario::create([
            'salario_anterior' => $salarioAnterior,
            'salario_nuevo' => $request->salario_nuevo,
            'fecha_cambio_salario' => $request->fecha_cambio_salario,
            'id_empleado_puesto' => $empleadoPuesto->id,
        ]);
        return redirect()->route('nomina.index')->with('success', 'Salario actualizado exitosamente.');
    }
}
