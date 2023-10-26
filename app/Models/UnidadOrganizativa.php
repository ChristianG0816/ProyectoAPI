<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadOrganizativa extends Model
{
    use HasFactory;
    protected $table = 'unidad_organizativa';
    protected $fillable = [
        'nombre', 
        'id_unidad_padre'
    ];
    function unidad_padre() {
        return $this->belongsTo(UnidadOrganizativa::class, 'id_unidad_padre');
    }
}
