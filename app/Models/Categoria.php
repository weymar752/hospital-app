<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'Categoria';
    protected $primaryKey = 'ID_Categoria';
    public $timestamps = true;

    protected $fillable = [
        'Nombre_Categoria',
        'Descripcion_Categoria',
        'ID_Especialidad',
    ];

    // Relaciones
    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'ID_Especialidad', 'ID_Especialidad');
    }

    public function personalMedico()
    {
        return $this->hasMany(Personal_Medico::class, 'ID_Categoria', 'ID_Categoria');
    }
}
