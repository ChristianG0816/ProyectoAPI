<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmpleadoPuesto;

class NominaController extends Controller
{
    public function index()
    {
        $empleados = EmpleadoPuesto::all();
        return view('nomina.index', compact('empleados'));
    }

    public function create()
    {
        return view('nomina.create');
    }
}
