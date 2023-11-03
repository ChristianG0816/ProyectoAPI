<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_movimiento_nomina extends Model
{
    use HasFactory;
    
    protected $table = 'tipo_movimiento_nomina';
    protected $fillable = [
        'nombre',
    ];
}
