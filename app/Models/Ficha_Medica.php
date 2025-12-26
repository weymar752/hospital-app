<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha_Medica extends Model
{
    use HasFactory;

    protected $table = 'Ficha_Medica';
    protected $primaryKey = 'No_Ficha_Medica';
    public $timestamps = true;

    protected $fillable = [
    'CI_Paciente',
    'Fecha_Creacion',
    'Fecha_Cita',
    'Hora_Cita',
    'Estado_Cita',
    'Motivo_Consulta',
    'Ci_Personal_Medico',
    'ID_Hospital',
    'ID_Unidad'
];

    // Relaciones
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'CI_Paciente', 'CI_Paciente');
    }

    public function personalMedico()
    {
        return $this->belongsTo(Personal_Medico::class, 'Ci_Personal_Medico', 'Ci_Personal_Medico');
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'ID_Hospital', 'ID_Hospital');
    }
}
