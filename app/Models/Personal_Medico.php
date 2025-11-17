<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Personal_Medico extends Authenticatable
{
    use HasFactory;

    protected $table = 'Personal_Medico';
    protected $primaryKey = 'Ci_Personal_Medico';
    public $timestamps = true;

    // PK tipo CI (string, no incrementable)
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'Ci_Personal_Medico',
        'Nombres_PM',
        'Apellido_P_PM',
        'Apellido_M_PM',
        'Telefono',
        'Email',
        'ID_Categoria',
        'ID_Hospital',
        'ID_Unidad',
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
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'ID_Categoria', 'ID_Categoria');
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'ID_Hospital', 'ID_Hospital');
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'ID_Unidad', 'ID_Unidad');
    }

    public function fichasMedicas()
    {
        return $this->hasMany(Ficha_Medica::class, 'Ci_Personal_Medico', 'Ci_Personal_Medico');
    }
}
