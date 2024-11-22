<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultaMedica extends Model
{
    use HasFactory;

    protected $table = 'consulta_medica';

    protected $fillable =[

        'nombre_paciente',
        'ubicacion',
        'telefono',
        'sintomas_paciente',
        'fecha_consulta',
        'hora_consulta'

    ];

}
