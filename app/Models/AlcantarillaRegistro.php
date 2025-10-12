<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlcantarillaRegistro extends Model
{
    use HasFactory;

    protected $table = 'alcantarillas_registros';
    protected $primaryKey = 'id_registro';
    public $timestamps = false; // No tienes created_at / updated_at

    protected $fillable = [
        'id_alcantarilla',
        'fecha_hora',
        'caudal_lps',
        'duracion_segundos',
        'observaciones'
    ];

    // Relación con Alcantarilla
    public function alcantarilla()
    {
        return $this->belongsTo(Alcantarilla::class, 'id_alcantarilla');
    }
}
