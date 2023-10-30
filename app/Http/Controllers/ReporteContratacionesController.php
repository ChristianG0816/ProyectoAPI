<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpleadoPuesto;
use App\Models\UnidadOrganizativa;

class ReporteContratacionesController extends Controller
{
    public function index(Request $request)
    {
        $unidades = UnidadOrganizativa::all();
        $rules = [
            'fecha_inicio' => 'nullable|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
        ];
        $messages = [
            'fecha_inicio.date' => 'La fecha de inicio no es una fecha válida.',
            'fecha_fin.date' => 'La fecha de fin no es una fecha válida.',
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser posterior o igual a la fecha de inicio.',
        ];
        $this->validate($request, $rules, $messages);

        $query = EmpleadoPuesto::where('actual', true);

        // Obtén los valores de los filtros del Request
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');
        $unidad_organizativa = $request->input('unidad_organizativa');
        // Verifica las fechas
        // if ($fecha_inicio && $fecha_fin) {
        //     if ($fecha_inicio > $fecha_fin) {
        //         return redirect()->route('reporte-contrataciones')->with('error', 'La fecha de inicio no puede ser mayor que la fecha de fin.')
        //         ->withInput();
        //     }
        // }
        
        // Aplica los filtros a la consulta si se proporcionan
        if ($fecha_inicio) {
            $query->where('fecha_inicio', '>=', $fecha_inicio);
        }
        if ($fecha_fin) {
            $query->where('fecha_inicio', '<=', $fecha_fin);
        }
        if ($unidad_organizativa) {
            $query->whereHas('puesto.unidad_organizativa', function ($query) use ($unidad_organizativa) {
                $query->where('id', $unidad_organizativa);
            });
        }        

        $empleadosPuesto = $query->orderBy('fecha_inicio', 'desc')->get();

        return view('reportes.contrataciones', compact('empleadosPuesto', 'unidades', 'fecha_inicio', 'fecha_fin', 'unidad_organizativa'));
    }

}
