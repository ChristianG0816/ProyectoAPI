<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;
    protected $table = 'puesto';
    protected $fillable = ['nombre', 'salario_mensual_base', 'id_unidad_organizativa'];

    public function unidad_organizativa()
    {
        return $this->belongsTo(UnidadOrganizativa::class, 'id_unidad_organizativa');
    }
}
