<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;

    protected $table = 'Unidad';
    protected $primaryKey = 'ID_Unidad';
    public $timestamps = true;

    protected $fillable = [
        'Nombre_Unidad',
        'Descripcion_Unidad',
        'ID_Departamento',
        'ID_Hospital',
        'No_Sala',
    ];

    // Relaciones
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'ID_Departamento', 'ID_Departamento');
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'ID_Hospital', 'ID_Hospital');
    }

    public function sala()
    {
        return $this->belongsTo(Salas::class, 'No_Sala', 'No_Sala');
    }

    public function personalMedico()
    {
        return $this->hasMany(Personal_Medico::class, 'ID_Unidad', 'ID_Unidad');
    }
}
