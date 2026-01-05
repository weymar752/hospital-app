<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial_Medico extends Model
{
    use HasFactory;

    protected $table = 'Historial_Medico';
    protected $primaryKey = 'ID_Historial';
    public $timestamps = true;

    protected $fillable = [
        'No_Ficha_Medica',
        'CI_Paciente',
        'ID_Hospital',
        'ID_Unidad',
        'Ci_Personal_Medico',
        'Fecha_Atencion',
        'Diagnostico',
        'Enfermedad_Principal',
        'Tratamiento',
        'Observaciones',
    ];

    // 🔗 Relaciones

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'CI_Paciente', 'CI_Paciente');
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'ID_Hospital', 'ID_Hospital');
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'ID_Unidad', 'ID_Unidad');
    }

    public function personalMedico()
    {
        return $this->belongsTo(Personal_Medico::class, 'Ci_Personal_Medico', 'Ci_Personal_Medico');
    }

    public function fichaMedica()
    {
        return $this->belongsTo(Ficha_Medica::class, 'No_Ficha_Medica', 'No_Ficha_Medica');
    }
}
