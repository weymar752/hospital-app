<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'Departamento';
    protected $primaryKey = 'ID_Departamento';
    public $timestamps = true;

    protected $fillable = [
        'Nombre_Departamento',
        'Descripcion_Departamento',
    ];

    // Relaciones
    public function unidades()
    {
        return $this->hasMany(Unidad::class, 'ID_Departamento', 'ID_Departamento');
    }
}
