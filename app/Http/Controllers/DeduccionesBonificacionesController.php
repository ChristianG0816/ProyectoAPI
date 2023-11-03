<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Movimiento_nomina;

class DeduccionesBonificacionesController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {
       
    }

    public function store(Request $request)
    {
       
    }

    public function show($id)
    {
        $empleado = Empleado::where('id', $id)->first();
        $movimientosNomina = Movimiento_nomina::where('id_empleado', $id)->get();
        
        return view('deduccionesbonificaciones.index', compact('empleado','movimientosNomina'));
    }

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
