<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpleadoPuesto;
use App\Models\Departamento;
use App\Models\Banco;
use App\Models\TipoDocumento;
use App\Models\Puesto;
use App\Models\Jornada;

class NominaController extends Controller
{
    public function index()
    {
        $empleados = EmpleadoPuesto::all();
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
        $request->validate([
            'codigo' => 'required',
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
            'salario'   => 'required',
        ],
        [
            'fecha_nacimiento.after_or_equal' => 'La fecha de nacimiento debe ser igual o posterior a la fecha mínima.',
            'fecha_nacimiento.before_or_equal' => 'La fecha de nacimiento debe ser igual o anterior a la fecha actual.',
            'telefono.regex' => 'El teléfono debe tener el formato 9999-9999.',
        ]);
        EmpleadoPuesto::create($request->all());
        return redirect()->route('nomina.index')->with('success', 'EmpleadoPuesto creado exitosamente.');
    }
}
