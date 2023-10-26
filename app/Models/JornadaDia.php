<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JornadaDia extends Model
{
    use HasFactory;
    protected $table = 'jornada_dia';
    protected $fillable = ['id_jornada', 'id_dia'];

    public function jornada()
    {
        return $this->belongsTo(Jornada::class, 'id_jornada');
    }

    public function dia()
    {
        return $this->belongsTo(Dia::class, 'id_dia');
    }
}
