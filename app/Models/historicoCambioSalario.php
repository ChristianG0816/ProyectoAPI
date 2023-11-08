<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoCambioSalario extends Model
{
    use HasFactory;
    protected $table = 'historico_cambio_salario';
    protected $fillable = [
        'salario_nuevo',
        'salario_anterior',
        'fecha_cambio_salario',
        'id_empleado_puesto',
    ];

    public function empleado_puesto()
    {
        return $this->belongsTo(EmpleadoPuesto::class, 'id_empleado_puesto');
    }

}
