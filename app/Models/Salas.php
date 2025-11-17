<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salas extends Model
{
    use HasFactory;

    protected $table = 'Salas';
    protected $primaryKey = 'No_Sala';
    public $timestamps = true;

    protected $fillable = [
        'Camillas',
        'Bloque',
        'Piso',
        'Estado',
    ];

    // Relaciones
    public function unidades()
    {
        return $this->hasMany(Unidad::class, 'No_Sala', 'No_Sala');
    }
}
