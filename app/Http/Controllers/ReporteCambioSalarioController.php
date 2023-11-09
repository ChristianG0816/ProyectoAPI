<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpleadoPuesto;
use App\Models\UnidadOrganizativa;
use App\Models\HistoricoCambioSalario;
use App\Models\Empleado;
use App\Models\Puesto;

class ReporteCambioSalarioController extends Controller
{

    /*if ($unidad_organizativa) {
        $query->whereHas('puesto.unidad_organizativa', function ($query) use ($unidad_organizativa) {
            $query->where('id', $unidad_organizativa);
        });
    }*/
    public function index(Request $request)
    {
        $unidades = UnidadOrganizativa::all();
        $puestos = Puesto::all();

        $puesto = $request->input('puesto');
        $unidad_organizativa = $request->input('unidad_organizativa');

        $query = HistoricoCambioSalario::query();

        if (!empty($unidad_organizativa)) {
            $query->whereHas('empleado_puesto.puesto.unidad_organizativa', function ($query) use ($unidad_organizativa) {
                $query->where('id', $unidad_organizativa);
            });
        }

        if (!empty($puesto)) {
            $query->whereHas('empleado_puesto', function ($query) use ($puesto) {
                $query->where('id_puesto', $puesto);
            });
        }

        $empleadosSalarios = $query
            ->with(['empleado_puesto.empleado', 'empleado_puesto.puesto.unidad_organizativa'])
            ->orderBy('fecha_cambio_salario', 'desc')
            ->get();

        return view('reportes.salarios', compact('empleadosSalarios', 'unidades','puestos', 'unidad_organizativa', 'puesto'));
    }
}