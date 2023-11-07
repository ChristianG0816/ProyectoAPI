<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoPuesto extends Model
{
    use HasFactory;
    protected $table = 'empleado_puesto';
    protected $fillable = ['fecha_inicio', 'fecha_fin', 'salario_mensual', 'actual', 'cambio_puesto', 'id_empleado', 'id_puesto', 'id_jornada'];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }

    public function puesto()
    {
        return $this->belongsTo(Puesto::class, 'id_puesto');
    }

    public function jornada()
    {
        return $this->belongsTo(Jornada::class, 'id_jornada');
    }
    
    public function historicoTrabajo()
    {
        return $this->hasMany(HistoricoTrabajo::class, 'id_empleado_puesto');
    }
}
