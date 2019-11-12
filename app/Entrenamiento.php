<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrenamiento extends Model
{
    //

    protected $table = "entrenamientos";

    protected $fillable = [
        'tipo_entrenamiento', 'nombre_ejercicio', 'descripcion', 'foto',
    ];
}
