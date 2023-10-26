<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    use HasFactory;
    protected $table = 'jornada';
    protected $fillable = ['nombre', 'hora_entrada', 'hora_salida', 'id_dia'];

    public function dia()
    {
        return $this->belongsTo(Dia::class, 'id_dia');
    }
}
