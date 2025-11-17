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
        'CI_Paciente',
        'Fecha_Creacion',
        'Documento',
    ];

    // Relaciones
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'CI_Paciente', 'CI_Paciente');
    }
}
