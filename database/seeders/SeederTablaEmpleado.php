<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empleado;
use App\Models\DocumentoEmpleado;
use App\Models\EmpleadoPuesto;
use App\Models\Tipo_frecuencia;
use App\Models\Tipo_movimiento_nomina;
use App\Models\Movimiento_nomina;

class SeederTablaEmpleado extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empleado 1
        Empleado::create([
        'codigo'=> 'LO425',
        'primer_nombre'=> 'Luis',
        'segundo_nombre'=> 'Oscar',
        'primer_apellido'=> 'Garcia',
        'segundo_apellido'=> 'Orellana',
        'apellido_casada'=> '',
        'fecha_nacimiento'=> '1997-08-24',
        'telefono'=> '6304-7415',
        'direccion'=> 'Avenida Independencia y Alameda Juan Pablo II, No. 437',
        'fecha_ingreso'=> '2022-10-15',
        'numero_cuenta'=> '3546454745',
        'tipo_cuenta'=> 'Ahorros',
        'nacionalidad'=> 'El Salvador',
        'estado_civil'=> 'Soltero/a',
        'sexo'=> 'Masculino',
        'id_banco'=> '1',
        'id_municipio' => '190'
        ]);

        //Empleado 2
        Empleado::create([
            'codigo'=> 'KC635',
            'primer_nombre'=> 'Karla',
            'segundo_nombre'=> 'Camila',
            'primer_apellido'=> 'Aragon',
            'segundo_apellido'=> 'Torres',
            'apellido_casada'=> 'Guevara',
            'fecha_nacimiento'=> '1995-09-16',
            'telefono'=> '7305-6423',
            'direccion'=> '1ª Calle Poniente entre 60ª Avenida Norte y Boulevard Constitución No. 3549',
            'fecha_ingreso'=> '2023-10-03',
            'numero_cuenta'=> '5587414766',
            'tipo_cuenta'=> 'Corriente',
            'nacionalidad'=> 'El Salvador',
            'estado_civil'=> 'Soltero/a',
            'sexo'=> 'Femenino',
            'id_banco'=> '2',
            'id_municipio' => '190'
            ]);


        //Empleado 1
        DocumentoEmpleado::create([
            'numero'=> '06048121-1',
            'id_tipo_documento'=> '1',
            'id_empleado' => '1'
        ]);

        DocumentoEmpleado::create([
            'numero'=> '5484-418487-488-4',
            'id_tipo_documento'=> '2',
            'id_empleado' => '1'
        ]);

        DocumentoEmpleado::create([
            'numero'=> '8587448844848',
            'id_tipo_documento'=> '3',
            'id_empleado' => '1'
        ]);

        DocumentoEmpleado::create([
            'numero'=> '484515484',
            'id_tipo_documento'=> '4',
            'id_empleado' => '1'
        ]);

        DocumentoEmpleado::create([
            'numero'=> 'GS747844',
            'id_tipo_documento'=> '5',
            'id_empleado' => '1'
        ]);

        DocumentoEmpleado::create([
            'numero'=> '8778784848877',
            'id_tipo_documento'=> '6',
            'id_empleado' => '1'
        ]);
        
        //Empleado 2
        DocumentoEmpleado::create([
            'numero'=> '03080961-1',
            'id_tipo_documento'=> '1',
            'id_empleado' => '2'
        ]);

        DocumentoEmpleado::create([
            'numero'=> '3484-518167-555-1',
            'id_tipo_documento'=> '2',
            'id_empleado' => '2'
        ]);

        DocumentoEmpleado::create([
            'numero'=> '5126741242843',
            'id_tipo_documento'=> '3',
            'id_empleado' => '2'
        ]);

        DocumentoEmpleado::create([
            'numero'=> '584113456',
            'id_tipo_documento'=> '4',
            'id_empleado' => '2'
        ]);

        DocumentoEmpleado::create([
            'numero'=> 'HN765823',
            'id_tipo_documento'=> '5',
            'id_empleado' => '2'
        ]);

        DocumentoEmpleado::create([
            'numero'=> '5587342115647',
            'id_tipo_documento'=> '6',
            'id_empleado' => '2'
        ]);


        //Empleado 1
        EmpleadoPuesto::create([
            'fecha_inicio' => '2023-02-23',
            'fecha_fin' => null,
            'salario_mensual' => '1000.00',
            'actual' => '1',
            'cambio_puesto' => '0',
            'id_empleado' => '1',
            'id_puesto' => '1',
            'id_jornada' => '1'
        ]);

        //Empleado 2
        EmpleadoPuesto::create([
            'fecha_inicio' => '2023-06-04',
            'fecha_fin' => null,
            'salario_mensual' => '1000.00',
            'actual' => '1',
            'cambio_puesto' => '0',
            'id_empleado' => '2',
            'id_puesto' => '2',
            'id_jornada' => '2'
        ]);

        //Creamos elementos de movimiento para empleado 1
        Tipo_frecuencia::create([
            'nombre' => 'Mensual'
        ]);

        Tipo_frecuencia::create([
            'nombre' => 'Trimestral'
        ]);

        Tipo_movimiento_nomina::create([
            'nombre' => 'Bonificación'
        ]);

        Tipo_movimiento_nomina::create([
            'nombre' => 'Deducción'
        ]);

        //Empleado 1
        Movimiento_nomina::create([
            'id_empleado' => '1',
            'id_tipo_frecuencia' => '1',
            'id_tipo_movimiento_nomina' => '2',
            'concepto' => 'Descuento por daños',
            'valor_pagar' => '30.35',
            'accion' => 'Se cancelara por cuotas',
            'observacion' => '2/6 Cuotas',
            'fecha_movimiento' => '2023-10-05'
        ]);

        Movimiento_nomina::create([
            'id_empleado' => '1',
            'id_tipo_frecuencia' => '1',
            'id_tipo_movimiento_nomina' => '1',
            'concepto' => 'Bono extra',
            'valor_pagar' => '50.00',
            'accion' => 'Se dara por una sola cuota',
            'observacion' => 'Ninguna',
            'fecha_movimiento' => '2023-10-17'
        ]);

         //Empleado 2
         Movimiento_nomina::create([
            'id_empleado' => '2',
            'id_tipo_frecuencia' => '2',
            'id_tipo_movimiento_nomina' => '2',
            'concepto' => 'Descuento por daños',
            'valor_pagar' => '25.23',
            'accion' => 'Se cancelara por cuotas',
            'observacion' => '4 Cuotas',
            'fecha_movimiento' => '2023-09-04'
        ]);

        Movimiento_nomina::create([
            'id_empleado' => '2',
            'id_tipo_frecuencia' => '1',
            'id_tipo_movimiento_nomina' => '1',
            'concepto' => 'Bono extra',
            'valor_pagar' => '30.00',
            'accion' => 'Se dara por un mes',
            'observacion' => 'Ninguna',
            'fecha_movimiento' => '2023-10-12'
        ]);


    }
}
