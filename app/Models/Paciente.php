<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Paciente extends Authenticatable
{
    use HasFactory;

    protected $table = 'Paciente';
    protected $primaryKey = 'CI_Paciente';
    public $timestamps = true;

    // PK tipo CI (string, no incrementable)
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'CI_Paciente',
        'Nombres',
        'Apellido_P',
        'Apellido_M',
        'Fecha_Nacimiento',
        'Tipo_Sangre',
        'Alergias',
        'ID_Hospital',
        'Contrasena',
    ];
        protected $hidden = [
        'Contrasena',
    ];
        // Mutator para hashear automáticamente la contraseña
    public function setContrasenaAttribute($value)
    {
        $this->attributes['Contrasena'] = Hash::make($value);
    }
    // Relaciones
    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'ID_Hospital', 'ID_Hospital');
    }

    public function historialMedico()
    {
        return $this->hasMany(Historial_Medico::class, 'CI_Paciente', 'CI_Paciente');
    }

    public function fichasMedicas()
    {
        return $this->hasMany(Ficha_Medica::class, 'CI_Paciente', 'CI_Paciente');
    }
}
