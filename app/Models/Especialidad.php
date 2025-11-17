<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;

    protected $table = 'Especialidad';
    protected $primaryKey = 'ID_Especialidad';
    public $timestamps = true;

    protected $fillable = [
        'Nombre_Especialidad',
        'Descripcion_Especialidad',
    ];

    // Relaciones
    public function categorias()
    {
        return $this->hasMany(Categoria::class, 'ID_Especialidad', 'ID_Especialidad');
    }
}
