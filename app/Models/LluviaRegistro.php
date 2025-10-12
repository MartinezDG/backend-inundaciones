<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\EstacionMeteorologica;

class LluviaRegistro extends Model
{
    protected $table = 'lluvia_registros';
    protected $primaryKey = 'id_registro';
    public $timestamps = false;

    protected $fillable = [
        'id_estacion',
        'fecha_hora',
        'precipitacion_mm',
        'duracion_min',
        'metodo_captura'
    ];

    // Relaciones
    public function estacion()
    {
        return $this->belongsTo(EstacionMeteorologica::class, 'id_estacion');
    }

    // Ocultamos geom de la estación para evitar errores de JSON
    protected $appends = ['latitud_estacion', 'longitud_estacion'];

    public function getLatitudEstacionAttribute()
    {
        return $this->estacion ? $this->estacion->latitud : null;
    }

    public function getLongitudEstacionAttribute()
    {
        return $this->estacion ? $this->estacion->longitud : null;
    }
}

