<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoTrabajo extends Model
{
    use HasFactory;
    
    protected $table = 'historico_trabajos';

    protected $fillable = [
        'id_empleado_puesto',
        'unidad',
        'fecha_inicio',
        'fecha_fin',
        'dias_laborados',
        'turno',
        'horas_extra_normal',
        'horas_dia_descanso',
        'horas_dias_festivo',
        'horas_normal',
        'salario_total'
    ];
}
