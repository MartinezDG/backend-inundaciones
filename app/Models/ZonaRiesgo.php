<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZonaRiesgo extends Model
{
    protected $table = 'zonas_riesgo';
    protected $primaryKey = 'id_zona';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'nivel_riesgo_id',
        'id_municipio',
        'geometria',
        'creado_por'
    ];

    // Ocultamos el campo geométrico para evitar errores de JSON
    protected $hidden = ['geometria'];

    // Atributos adicionales que aparecerán en JSON
    protected $appends = ['latitud', 'longitud'];

    // Extraemos latitud y longitud desde geometria (WKB)
    public function getLatitudAttribute()
    {
        if (!$this->geometria) return null;
        $point = unpack('x/x/x/x/d2', $this->geometria); // decodifica el WKB
        return $point[2] ?? null; // latitud
    }

    public function getLongitudAttribute()
    {
        if (!$this->geometria) return null;
        $point = unpack('x/x/x/x/d2', $this->geometria); // decodifica el WKB
        return $point[1] ?? null; // longitud
    }

    // Relaciones
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'id_municipio');
    }

    public function nivelRiesgo()
    {
        return $this->belongsTo(NivelRiesgo::class, 'nivel_riesgo_id');
    }
}
