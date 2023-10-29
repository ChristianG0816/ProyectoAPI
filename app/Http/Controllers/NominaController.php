<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpleadoPuesto;
use App\Models\Departamento;
use App\Models\Banco;
use App\Models\TipoDocumento;
use App\Models\Puesto;
use App\Models\Jornada;
use App\Models\Empleado;
use App\Models\DocumentoEmpleado;

class NominaController extends Controller
{
    public function index()
    {
        //EmpleadoPuesto cuya varaiable actual sea true order by el nombre del empleado
        $empleados = EmpleadoPuesto::where('actual', true)->get()->sortBy('empleado.primer_nombre');
        return view('nomina.index', compact('empleados'));
    }

    public function create()
    {
        $nacionalidades = ['us' => 'Estados Unidos', 'ca' => 'Canadá', 'mx' => 'México', 'es' => 'España', 'ar' => 'Argentina', 'co' => 'Colombia', 'pe' => 'Perú', 've' => 'Venezuela', 'cl' => 'Chile', 'ec' => 'Ecuador', 'cu' => 'Cuba', 'bo' => 'Bolivia', 'gt' => 'Guatemala', 'hn' => 'Honduras', 'py' => 'Paraguay', 'sv' => 'El Salvador', 'ni' => 'Nicaragua', 'pr' => 'Puerto Rico', 'uy' => 'Uruguay', 'pa' => 'Panamá', 'cr' => 'Costa Rica', 'do' => 'República Dominicana', 'gy' => 'Guyana', 'ht' => 'Haití', 'bz' => 'Belice', 'fr' => 'Francia', 'it' => 'Italia', 'de' => 'Alemania', 'uk' => 'Reino Unido', 'jp' => 'Japón', 'cn' => 'China', 'in' => 'India', 'kr' => 'Corea del Sur', 'ng' => 'Nigeria', 'eg' => 'Egipto', 'za' => 'Sudáfrica', 'au' => 'Australia', 'nz' => 'Nueva Zelanda'];
        asort($nacionalidades);
        $estado_civil = ['soltero' => 'Soltero/a', 'casado' => 'Casado/a', 'divorciado' => 'Divorciado/a', 'viudo' => 'Viudo/a', 'otro' => 'Otro'];
        $sexo = ['masculino' => 'Masculino', 'femenino' => 'Femenino'];
        $departamentos = Departamento::all();
        $bancos = Banco::all();
        $tipos_cuentas = ['ahorros' => 'Ahorros', 'corriente' => 'Corriente'];
        $tipos_documentos = TipoDocumento::all();
        $puestos = Puesto::all();
        $jornadas = Jornada::all();
        return view('nomina.create', compact('nacionalidades', 'estado_civil', 'sexo', 'departamentos', 'bancos', 'tipos_cuentas', 'tipos_documentos', 'puestos', 'jornadas'));
    }

    public function store(Request $request)
    {
        $fecha_minima = '1900-01-01'; // Cambia esta fecha según tus necesidades
        $fecha_maxima = date('Y-m-d'); // Fecha actual
        $salarioInicial = 0;
        try {
            //guardar solo el valor del salario en la variable
            $salarioInicial = Puesto::where('id', $request->puesto)->pluck('salario_mensual_base')->first();
            if ($salarioInicial == null) {
                $salarioInicial = 0;
            }
        } catch (\Throwable $th) {
            $salarioInicial = 0;
        }
        $request->validate([
            'codigo' => 'required|unique:empleado,codigo',
            'primer_nombre' => 'required',
            'segundo_nombre' => 'required',
            'primer_apellido' => 'required',
            'segundo_apellido' => 'required',
            'fecha_nacimiento' => 'required|date|after_or_equal:' . $fecha_minima . '|before_or_equal:' . $fecha_maxima,
            'departamento' => 'required',
            'municipio' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|regex:/^\d{4}-\d{4}$/',
            'nacionalidad' => 'required',
            'estado_civil' => 'required',
            'sexo' => 'required',
            'banco' => 'required',
            'numero_cuenta' => 'required',
            'tipo_cuenta' => 'required',
            'dui' => 'required',
            'nit' => 'required',
            'nup' => 'required',
            'isss' => 'required',
            'puesto'    => 'required',
            'jornada'   => 'required',
            'salario' => 'required|numeric|min:' . $salarioInicial,
            'fecha_inicio' => 'required|date|after_or_equal:' . $fecha_minima,
        ],
        [
            'fecha_nacimiento.after_or_equal' => 'La fecha de nacimiento debe ser igual o posterior a la fecha mínima.',
            'fecha_nacimiento.before_or_equal' => 'La fecha de nacimiento debe ser igual o anterior a la fecha actual.',
            'telefono.regex' => 'El teléfono debe tener el formato 9999-9999.',
            'salario.min' => 'El salario no puede ser menor que el salario base del puesto.',
        ]);


        $empleadoData = [
            'codigo' => $request->codigo,
            'primer_nombre' => $request->primer_nombre,
            'segundo_nombre' => $request->segundo_nombre,
            'primer_apellido' => $request->primer_apellido,
            'segundo_apellido' => $request->segundo_apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'id_municipio' => $request->municipio,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'nacionalidad' => $request->nacionalidad,
            'estado_civil' => $request->estado_civil,
            'sexo' => $request->sexo,
            'id_banco' => $request->banco,
            'numero_cuenta' => $request->numero_cuenta,
            'tipo_cuenta' => $request->tipo_cuenta,
            'fecha_ingreso' => $request->fecha_inicio,
        ];
        if ($request->has('apellido_casada')) {
            $empleadoData['apellido_casada'] = $request->apellido_casada;
        }
        Empleado::create($empleadoData);

        if ($request->has('dui')) {
            DocumentoEmpleado::create([
                'numero' => $request->dui,
                'id_tipo_documento' => 1,
                'id_empleado' => Empleado::where('codigo', $request->codigo)->pluck('id')->first(),
            ]);
        }
        if ($request->has('nit')) {
            DocumentoEmpleado::create([
                'numero' => $request->nit,
                'id_tipo_documento' => 2,
                'id_empleado' => Empleado::where('codigo', $request->codigo)->pluck('id')->first(),
            ]);
        }
        if ($request->has('nup')) {
            DocumentoEmpleado::create([
                'numero' => $request->nup,
                'id_tipo_documento' => 3,
                'id_empleado' => Empleado::where('codigo', $request->codigo)->pluck('id')->first(),
            ]);
        }
        if ($request->has('isss')) {
            DocumentoEmpleado::create([
                'numero' => $request->isss,
                'id_tipo_documento' => 4,
                'id_empleado' => Empleado::where('codigo', $request->codigo)->pluck('id')->first(),
            ]);
        }
        if ($request->has('pasaporte') && $request->pasaporte != null) {
            DocumentoEmpleado::create([
                'numero' => $request->pasaporte,
                'id_tipo_documento' => 5,
                'id_empleado' => Empleado::where('codigo', $request->codigo)->pluck('id')->first(),
            ]);
        }
        if ($request->has('residencia') && $request->residencia != null) {
            DocumentoEmpleado::create([
                'numero' => $request->residencia,
                'id_tipo_documento' => 6,
                'id_empleado' => Empleado::where('codigo', $request->codigo)->pluck('id')->first(),
            ]);
        }
        $empleadoPuestoData = [
            'id_empleado' => Empleado::where('codigo', $request->codigo)->pluck('id')->first(),
            'id_puesto' => $request->puesto,
            'id_jornada' => $request->jornada,
            'salario_mensual' => $request->salario,
            'fecha_inicio' => $request->fecha_inicio,
            'actual' => true,
            'cambio_puesto' => false,
        ];
        EmpleadoPuesto::create($empleadoPuestoData);
        return redirect()->route('nomina.index')->with('success', 'Empleado agregado a la nómina exitosamente.');
    }

    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $nacionalidades = ['us' => 'Estados Unidos', 'ca' => 'Canadá', 'mx' => 'México', 'es' => 'España', 'ar' => 'Argentina', 'co' => 'Colombia', 'pe' => 'Perú', 've' => 'Venezuela', 'cl' => 'Chile', 'ec' => 'Ecuador', 'cu' => 'Cuba', 'bo' => 'Bolivia', 'gt' => 'Guatemala', 'hn' => 'Honduras', 'py' => 'Paraguay', 'sv' => 'El Salvador', 'ni' => 'Nicaragua', 'pr' => 'Puerto Rico', 'uy' => 'Uruguay', 'pa' => 'Panamá', 'cr' => 'Costa Rica', 'do' => 'República Dominicana', 'gy' => 'Guyana', 'ht' => 'Haití', 'bz' => 'Belice', 'fr' => 'Francia', 'it' => 'Italia', 'de' => 'Alemania', 'uk' => 'Reino Unido', 'jp' => 'Japón', 'cn' => 'China', 'in' => 'India', 'kr' => 'Corea del Sur', 'ng' => 'Nigeria', 'eg' => 'Egipto', 'za' => 'Sudáfrica', 'au' => 'Australia', 'nz' => 'Nueva Zelanda'];
        asort($nacionalidades);
        $estado_civil = ['soltero' => 'Soltero/a', 'casado' => 'Casado/a', 'divorciado' => 'Divorciado/a', 'viudo' => 'Viudo/a', 'otro' => 'Otro'];
        $sexo = ['masculino' => 'Masculino', 'femenino' => 'Femenino'];
        $departamentos = Departamento::all();
        $bancos = Banco::all();
        $tipos_cuentas = ['ahorros' => 'Ahorros', 'corriente' => 'Corriente'];
        $tipos_documentos = TipoDocumento::all();
        $puestos = Puesto::all();
        $jornadas = Jornada::all();
        return view('nomina.edit', compact('empleado', 'nacionalidades', 'estado_civil', 'sexo', 'departamentos', 'bancos', 'tipos_cuentas', 'tipos_documentos', 'puestos', 'jornadas'));
    }

    public function update(Request $request, $id)
    {
        $fecha_minima = '1900-01-01'; // Cambia esta fecha según tus necesidades
        $fecha_maxima = date('Y-m-d'); // Fecha actual
        $request->validate([
            'codigo' => 'required|unique:empleado,codigo,' . $id,
            'primer_nombre' => 'required',
            'segundo_nombre' => 'required',
            'primer_apellido' => 'required',
            'segundo_apellido' => 'required',
            'fecha_nacimiento' => 'required|date|after_or_equal:' . $fecha_minima . '|before_or_equal:' . $fecha_maxima,
            'departamento' => 'required',
            'municipio' => 'required',
            'direccion' => 'required',
            'telefono' => 'required|regex:/^\d{4}-\d{4}$/',
            'nacionalidad' => 'required',
            'estado_civil' => 'required',
            'sexo' => 'required',
            'banco' => 'required',
            'numero_cuenta' => 'required',
            'tipo_cuenta' => 'required',
            'dui' => 'required',
            'nit' => 'required',
            'nup' => 'required',
            'isss' => 'required',
        ],
        [
            'fecha_nacimiento.after_or_equal' => 'La fecha de nacimiento debe ser igual o posterior a la fecha mínima.',
            'fecha_nacimiento.before_or_equal' => 'La fecha de nacimiento debe ser igual o anterior a la fecha actual.',
            'telefono.regex' => 'El teléfono debe tener el formato 9999-9999.',
        ]);
        Empleado::where('id', $id)->update([
            'codigo' => $request->codigo,
            'primer_nombre' => $request->primer_nombre,
            'segundo_nombre' => $request->segundo_nombre,
            'primer_apellido' => $request->primer_apellido,
            'segundo_apellido' => $request->segundo_apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'id_municipio' => $request->municipio,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'nacionalidad' => $request->nacionalidad,
            'estado_civil' => $request->estado_civil,
            'sexo' => $request->sexo,
            'id_banco' => $request->banco,
            'numero_cuenta' => $request->numero_cuenta,
            'tipo_cuenta' => $request->tipo_cuenta,
        ]);
        if ($request->has('apellido_casada')) {
            Empleado::where('id', $id)->update([
                'apellido_casada' => $request->apellido_casada,
            ]);
        }
        DocumentoEmpleado::where('id_empleado', $id)->delete();
        if ($request->has('dui')) {
            DocumentoEmpleado::create([
                'numero' => $request->dui,
                'id_tipo_documento' => 1,
                'id_empleado' => $id,
            ]);
        }
        if ($request->has('nit')) {
            DocumentoEmpleado::create([
                'numero' => $request->nit,
                'id_tipo_documento' => 2,
                'id_empleado' => $id,
            ]);
        }
        if ($request->has('nup')) {
            DocumentoEmpleado::create([
                'numero' => $request->nup,
                'id_tipo_documento' => 3,
                'id_empleado' => $id,
            ]);
        }
        if ($request->has('isss')) {
            DocumentoEmpleado::create([
                'numero' => $request->isss,
                'id_tipo_documento' => 4,
                'id_empleado' => $id,
            ]);
        }
        if ($request->has('pasaporte') && $request->pasaporte != null) {
            DocumentoEmpleado::create([
                'numero' => $request->pasaporte,
                'id_tipo_documento' => 5,
                'id_empleado' => $id,
            ]);
        }
        if ($request->has('residencia') && $request->residencia != null) {
            DocumentoEmpleado::create([
                'numero' => $request->residencia,
                'id_tipo_documento' => 6,
                'id_empleado' => $id,
            ]);
        }
        return redirect()->route('nomina.index')->with('success', 'Empleado actualizado exitosamente.');
    }

    public function show($id)
    {
        //
    }
}
