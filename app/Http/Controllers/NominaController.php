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
        $nacionalidades = [
            'Estados Unidos', 'Canadá', 'México', 'España', 'Argentina', 'Colombia', 'Perú', 'Venezuela', 'Chile', 'Ecuador', 'Cuba', 'Bolivia', 'Guatemala', 'Honduras', 'Paraguay', 'El Salvador', 'Nicaragua', 'Puerto Rico', 'Uruguay', 'Panamá', 'Costa Rica', 'República Dominicana', 'Guyana', 'Haití', 'Belice', 'Francia', 'Italia', 'Alemania', 'Reino Unido', 'Japón', 'China', 'India', 'Corea del Sur', 'Nigeria', 'Egipto', 'Sudáfrica', 'Australia', 'Nueva Zelanda'
        ];
        asort($nacionalidades);
        $estado_civil = [
            'Soltero/a',
            'Casado/a',
            'Divorciado/a',
            'Viudo/a',
            'Otro'
        ];        
        $sexo = ['Masculino', 'Femenino'];
        $tipos_cuentas = ['Ahorros', 'Corriente'];
        $departamentos = Departamento::all();
        $bancos = Banco::all();
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
        $empleadoPuesto = EmpleadoPuesto::where('id_empleado', $id)->where('actual', true)->first();
        $nacionalidades = [
            'Estados Unidos', 'Canadá', 'México', 'España', 'Argentina', 'Colombia', 'Perú', 'Venezuela', 'Chile', 'Ecuador', 'Cuba', 'Bolivia', 'Guatemala', 'Honduras', 'Paraguay', 'El Salvador', 'Nicaragua', 'Puerto Rico', 'Uruguay', 'Panamá', 'Costa Rica', 'República Dominicana', 'Guyana', 'Haití', 'Belice', 'Francia', 'Italia', 'Alemania', 'Reino Unido', 'Japón', 'China', 'India', 'Corea del Sur', 'Nigeria', 'Egipto', 'Sudáfrica', 'Australia', 'Nueva Zelanda'
        ];
        asort($nacionalidades);
        $estado_civil = [
            'Soltero/a',
            'Casado/a',
            'Divorciado/a',
            'Viudo/a',
            'Otro'
        ];        
        $sexo = ['Masculino', 'Femenino'];
        $tipos_cuentas = ['Ahorros', 'Corriente'];
        $departamentos = Departamento::all();
        $bancos = Banco::all();
        
        $tipos_documentos = TipoDocumento::all();
        $puestos = Puesto::all();
        $jornadas = Jornada::all();
        //Obtener documento dui del empleado
        $dui = DocumentoEmpleado::where('id_empleado', $id)->where('id_tipo_documento', 1)->pluck('numero')->first();
        //Obtener documento nit del empleado
        $nit = DocumentoEmpleado::where('id_empleado', $id)->where('id_tipo_documento', 2)->pluck('numero')->first();
        //Obtener documento nup del empleado
        $nup = DocumentoEmpleado::where('id_empleado', $id)->where('id_tipo_documento', 3)->pluck('numero')->first();
        //Obtener documento isss del empleado
        $isss = DocumentoEmpleado::where('id_empleado', $id)->where('id_tipo_documento', 4)->pluck('numero')->first();
        //Obtener documento pasaporte del empleado
        $pasaporte = DocumentoEmpleado::where('id_empleado', $id)->where('id_tipo_documento', 5)->pluck('numero')->first();
        //Obtener documento residencia del empleado
        $residencia = DocumentoEmpleado::where('id_empleado', $id)->where('id_tipo_documento', 6)->pluck('numero')->first();
        return view('nomina.edit', compact('empleado', 'nacionalidades', 'estado_civil', 'sexo', 'departamentos', 'bancos', 'tipos_cuentas', 'tipos_documentos', 'puestos', 'jornadas', 'dui', 'nit', 'nup', 'isss', 'pasaporte', 'residencia', 'empleadoPuesto'));
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
            'jornada'  => 'required',
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
        if ($request->has('dui')) {
            DocumentoEmpleado::where('id_empleado', $id)->where('id_tipo_documento', 1)->update([
                'numero' => $request->dui,
            ]);
        }
        if ($request->has('nit')) {
            DocumentoEmpleado::where('id_empleado', $id)->where('id_tipo_documento', 2)->update([
                'numero' => $request->nit,
            ]);
        }
        if ($request->has('nup')) {
            DocumentoEmpleado::where('id_empleado', $id)->where('id_tipo_documento', 3)->update([
                'numero' => $request->nup,
            ]);
        }
        if ($request->has('isss')) {
            DocumentoEmpleado::where('id_empleado', $id)->where('id_tipo_documento', 4)->update([
                'numero' => $request->isss,
            ]);
        }
        if ($request->has('pasaporte') && $request->pasaporte != null) {
            //verificar si el documento de pasaporte existe
            $pasaporte = DocumentoEmpleado::where('id_empleado', $id)->where('id_tipo_documento', 5)->pluck('numero')->first();
            if ($pasaporte == null) {
                DocumentoEmpleado::create([
                    'numero' => $request->pasaporte,
                    'id_tipo_documento' => 5,
                    'id_empleado' => $id,
                ]);
            } else {
                DocumentoEmpleado::where('id_empleado', $id)->where('id_tipo_documento', 5)->update([
                    'numero' => $request->pasaporte,
                ]);
            }
        }
        if ($request->has('residencia') && $request->residencia != null) {
            //verificar si el documento de residencia existe
            $residencia = DocumentoEmpleado::where('id_empleado', $id)->where('id_tipo_documento', 6)->pluck('numero')->first();
            if ($residencia == null) {
                DocumentoEmpleado::create([
                    'numero' => $request->residencia,
                    'id_tipo_documento' => 6,
                    'id_empleado' => $id,
                ]);
            } else {
                DocumentoEmpleado::where('id_empleado', $id)->where('id_tipo_documento', 6)->update([
                    'numero' => $request->residencia,
                ]);
            }
        }
        EmpleadoPuesto::where('id_empleado', $id)->where('actual', true)->update([
            'id_jornada' => $request->jornada,
        ]);
        return redirect()->route('nomina.index')->with('success', 'Empleado actualizado exitosamente.');
    }

    public function show($id)
    {
        $empleadoPuesto = EmpleadoPuesto::where('id', $id)->first();
        $dui = DocumentoEmpleado::where('id_empleado', $empleadoPuesto->empleado->id)->where('id_tipo_documento', 1)->pluck('numero')->first();
        $nit = DocumentoEmpleado::where('id_empleado', $empleadoPuesto->empleado->id)->where('id_tipo_documento', 2)->pluck('numero')->first();
        $nup = DocumentoEmpleado::where('id_empleado', $empleadoPuesto->empleado->id)->where('id_tipo_documento', 3)->pluck('numero')->first();
        $isss = DocumentoEmpleado::where('id_empleado', $empleadoPuesto->empleado->id)->where('id_tipo_documento', 4)->pluck('numero')->first();
        $pasaporte = DocumentoEmpleado::where('id_empleado', $empleadoPuesto->empleado->id)->where('id_tipo_documento', 5)->pluck('numero')->first();
        $residencia = DocumentoEmpleado::where('id_empleado', $empleadoPuesto->empleado->id)->where('id_tipo_documento', 6)->pluck('numero')->first();
        return view('nomina.show', compact('empleadoPuesto', 'dui', 'nit', 'nup', 'isss', 'pasaporte', 'residencia'));
    }

    public function editPuesto($id)
    {
        $empleadoPuesto = EmpleadoPuesto::where('id', $id)->first();
        $puestos = Puesto::all();
        $jornadas = Jornada::all();
        return view('nomina.editPuesto', compact('empleadoPuesto', 'puestos', 'jornadas'));
    }

    public function updatePuesto(Request $request, $id)
    {
        $empleadoPuesto = EmpleadoPuesto::where('id', $id)->first();
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
            'puesto' => 'required',
            'jornada' => 'required',
            'salario' => 'required|numeric|min:' . $salarioInicial,
            'fecha_inicio' => 'required|date|after_or_equal:' . $fecha_minima,
        ],
        [
            'fecha_inicio.after_or_equal' => 'La fecha de inicio debe ser igual o posterior a la fecha mínima.',
            'salario.min' => 'El salario no puede ser menor que el salario base del puesto.',
        ]);
        EmpleadoPuesto::where('id_empleado', $empleadoPuesto->empleado->id)->where('actual', true)->update([
            'actual' => false,
            'fecha_fin' => $request->fecha_inicio,
        ]);
        EmpleadoPuesto::create([
            'id_empleado' => $empleadoPuesto->empleado->id,
            'id_puesto' => $request->puesto,
            'id_jornada' => $request->jornada,
            'salario_mensual' => $request->salario,
            'fecha_inicio' => $request->fecha_inicio,
            'actual' => true,
            'cambio_puesto' => true,
        ]);
        return redirect()->route('nomina.index')->with('success', 'Puesto actualizado exitosamente.');
    }
}
