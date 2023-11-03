<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento_nomina extends Model
{
    use HasFactory;
    protected $table = 'movimiento_nomina';
    protected $fillable = [
        'id_empleado',
        'id_tipo_frecuencia',
        'id_tipo_movimiento_nomina',
        'concepto',
        'valor_pagar',
        'accion',
        'observacion',
        'fecha_movimiento'
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }

    public function tipoFrecuencia()
    {
        return $this->belongsTo(Tipo_frecuencia::class, 'id_tipo_frecuencia');
    }

    public function tipoMovimientoNomina()
    {
        return $this->belongsTo(Tipo_movimiento_nomina::class, 'id_tipo_movimiento_nomina');
    }
}
