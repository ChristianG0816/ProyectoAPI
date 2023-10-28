<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;

class MunicipioController extends Controller
{
    public function getMunicipios(Request $request)
    {
        $municipios = Municipio::where('id_departamento', $request->departamento_id)->pluck('nombre', 'id');
        
        return response()->json($municipios);
    }
    

}