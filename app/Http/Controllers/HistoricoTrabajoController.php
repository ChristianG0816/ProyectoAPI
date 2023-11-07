<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoricoTrabajo;
use App\Models\Empleado;
use App\Models\EmpleadoPuesto;
use App\Models\Puesto;
use App\Models\UnidadOrganizativa;

class HistoricoTrabajoController extends Controller
{
    // Método para mostrar una lista de historicos de trabajo
    public function index()
    {
        //$historicoTrabajos = HistoricoTrabajo::all();
        $empleados = EmpleadoPuesto::where('actual', true)->get()->sortBy('empleado.primer_nombre');
        dd($empleados);
        
        return view('historicoTrabajos.index', compact('historicoTrabajos'));
    }

    // Método para mostrar el formulario de creación
    public function create($id_empleado)
    {
        // Puedes implementar lógica adicional si es necesario
        return view('historicotrabajo.create');
    }

    // Método para almacenar un nuevo historico de trabajo en la base de datos
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'dias_laborados' => 'required',
            'turno' => 'required',
            'horas_extra_normal' => 'required|numeric',
            'horas_dia_descanso' => 'required|numeric',
            'horas_dias_festivo' => 'required|numeric',
            'horas_normal' => 'required|numeric',
        ]);

        $inputs = $request->all();
        $empleadoPuesto = EmpleadoPuesto::where('id',$request->id_empleado_puesto)->first();
        $resultado = Puesto::with('unidad_organizativa')
            ->select('id_unidad_organizativa', 'salario_mensual_base')
            ->where('id', $empleadoPuesto->id_puesto)->first();

        $nombreUnidad = $resultado->unidad_organizativa->nombre;
        $salarioHora = ($resultado->salario_mensual_base/4)/40;

        $salarioTotal = (($salarioHora*$inputs['horas_extra_normal'])*2) + (($salarioHora*$inputs['horas_dia_descanso'])*1.5) +
        (($salarioHora*$inputs['horas_dias_festivo'])*4) + ($salarioHora*$inputs['horas_normal']);

        $historico = new HistoricoTrabajo;
        $historico->id_empleado_puesto = $empleadoPuesto->id;
        $historico->unidad = $nombreUnidad;
        $historico->fecha_inicio = $inputs['fecha_inicio'];
        $historico->fecha_fin = $inputs['fecha_fin'];
        $historico->dias_laborados = $inputs['dias_laborados'];
        $historico->turno = $inputs['turno'];
        $historico->horas_extra_normal = $inputs['horas_extra_normal'];
        $historico->horas_dia_descanso = $inputs['horas_dia_descanso'];
        $historico->horas_dias_festivo = $inputs['horas_dias_festivo'];
        $historico->horas_normal = $inputs['horas_normal'];
        $historico->salario_total = $salarioTotal;

        $historico->save();

        // Redirige a la lista de historicos de trabajo después de crear uno nuevo
        return redirect()->route('historicotrabajo.show',['id_empleado'=>$empleadoPuesto->id_empleado]);
    }

    // Método para mostrar los detalles de un historico de trabajo específico
    public function show($id)
    {
        $historicoTrabajo = [];

        $empleado = Empleado::where('id', $id)->first();
        $idPuestoActual = EmpleadoPuesto::where('id_empleado',$id)->where('actual',1)->value('id');
        $puestos = EmpleadoPuesto::where('id_empleado',$id)->get();

        //$historicoPuesto = HistoricoTrabajo::where('id_empleado_puesto', $puestos->$id)->get();

        foreach ($puestos as $puesto) {
            $historicoPuesto = HistoricoTrabajo::where('id_empleado_puesto', $puesto->id)->get();
            $historicoTrabajo = array_merge($historicoTrabajo, $historicoPuesto->toArray());
        }
        
        return view('historicotrabajo.index', compact('empleado','historicoTrabajo','idPuestoActual'));
    }

    // Método para mostrar el formulario de edición
    public function edit($id_empleado_puesto,$id_historico)
    {   
        //dd($id_empleado_puesto,$id_historico);
        $historico = HistoricoTrabajo::find($id_historico);
        //dd($historico);

        return view('historicotrabajo.edit', compact('historico','id_empleado_puesto'));
    }

    // Método para actualizar un historico de trabajo específico en la base de datos
    public function update(Request $request, $id_historico)
    {
        // Validación de datos
        $request->validate([
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'dias_laborados' => 'required',
            'turno' => 'required',
            'horas_extra_normal' => 'required|numeric',
            'horas_dia_descanso' => 'required|numeric',
            'horas_dias_festivo' => 'required|numeric',
            'horas_normal' => 'required|numeric',
        ]);

        $inputs = $request->all();

        $empleadoPuesto = EmpleadoPuesto::where('id',$request->id_empleado_puesto)->first();

        $resultado = Puesto::with('unidad_organizativa')
            ->select('id_unidad_organizativa', 'salario_mensual_base')
            ->where('id', $empleadoPuesto->id_puesto)->first();

        $nombreUnidad = $resultado->unidad_organizativa->nombre;
        $salarioHora = ($resultado->salario_mensual_base/4)/40;

        $salarioTotal = (($salarioHora*$inputs['horas_extra_normal'])*2) + (($salarioHora*$inputs['horas_dia_descanso'])*1.5) +
        (($salarioHora*$inputs['horas_dias_festivo'])*4) + ($salarioHora*$inputs['horas_normal']);

        $historico = HistoricoTrabajo::find($id_historico);
        $historico->id_empleado_puesto = $empleadoPuesto->id;
        $historico->unidad = $nombreUnidad;
        $historico->fecha_inicio = $inputs['fecha_inicio'];
        $historico->fecha_fin = $inputs['fecha_fin'];
        $historico->dias_laborados = $inputs['dias_laborados'];
        $historico->turno = $inputs['turno'];
        $historico->horas_extra_normal = $inputs['horas_extra_normal'];
        $historico->horas_dia_descanso = $inputs['horas_dia_descanso'];
        $historico->horas_dias_festivo = $inputs['horas_dias_festivo'];
        $historico->horas_normal = $inputs['horas_normal'];
        $historico->salario_total = $salarioTotal;

        $historico->save();

        // Redirige a la lista de historicos de trabajo después de actualizar uno existente
        return redirect()->route('historicotrabajo.show',['id_empleado'=>$empleadoPuesto->id_empleado]);
    }

    // Método para eliminar un historico de trabajo específico de la base de datos
    public function destroy(HistoricoTrabajo $historicoTrabajo)
    {
        // Elimina el historico de trabajo
        $historicoTrabajo->delete();

        // Redirige a la lista de historicos de trabajo después de eliminar uno existente
        return redirect()->route('historicoTrabajos.index')->with('success', 'Historico de trabajo eliminado exitosamente.');
    }
}
