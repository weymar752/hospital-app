<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $table = 'Hospital';
    protected $primaryKey = 'ID_Hospital';
    public $timestamps = true;

    protected $fillable = [
        'Nombre_Hospital',
        'Nivel_Hospital',
        'Direccion_Hospital',
    ];

    // Relaciones
    public function unidades()
    {
        return $this->hasMany(Unidad::class, 'ID_Hospital', 'ID_Hospital');
    }

    public function personalMedico()
    {
        return $this->hasMany(Personal_Medico::class, 'ID_Hospital', 'ID_Hospital');
    }

    public function pacientes()
    {
        return $this->hasMany(Paciente::class, 'ID_Hospital', 'ID_Hospital');
    }

    public function fichasMedicas()
    {
        return $this->hasMany(Ficha_Medica::class, 'ID_Hospital', 'ID_Hospital');
    }
}
