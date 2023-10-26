<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleado';
    protected $fillable = [
        'codigo',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'apellido_casada',
        'fecha_nacimiento',
        'telefono',
        'direccion',
        'fecha_ingreso',
        'numero_cuenta',
        'tipo_cuenta',
        'nacionalidad',
        'estado_civil',
        'sexo',
        'id_banco',
        'id_municipio'
    ];

    public function banco()
    {
        return $this->belongsTo(Banco::class, 'id_banco');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'id_municipio');
    }
}
