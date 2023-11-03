<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_frecuencia extends Model
{
    use HasFactory;
    protected $table = 'tipo_frecuencia';

    protected $fillable = [
        'nombre',
    ];

}
