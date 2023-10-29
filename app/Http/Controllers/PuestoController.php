<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puesto;

class PuestoController extends Controller
{
    public function getSalarioPuesto(Request $request)
    {
        $salario = Puesto::where('id', $request->puesto_id)->pluck('salario_mensual_base');
        return response()->json($salario);
    }
}
