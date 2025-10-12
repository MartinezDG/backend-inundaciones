<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alcantarilla extends Model
{
    protected $table = 'alcantarillas';
    protected $primaryKey = 'id_alcantarilla';
    public $timestamps = false;

    protected $fillable = [
        'codigo',
        'nombre',
        'id_municipio',
        'ubicacion',
        'capacidad_max_lps',
        'geom',
        'instalado_en',
        'activo',
        'creado_por'
    ];

    // Ocultamos geom para que no se envíe directo al JSON
    protected $hidden = ['geom'];

    // Atributos adicionales que aparecerán en JSON
    protected $appends = ['latitud', 'longitud'];

    // Extraemos latitud y longitud desde geom (WKB)
    public function getLatitudAttribute()
    {
        if (!$this->geom) return null;
        $point = unpack('x/x/x/x/d2', $this->geom); // decodifica el WKB
        return $point[2] ?? null; // latitud
    }

    public function getLongitudAttribute()
    {
        if (!$this->geom) return null;
        $point = unpack('x/x/x/x/d2', $this->geom); // decodifica el WKB
        return $point[1] ?? null; // longitud
    }

    // Relaciones
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'id_municipio');
    }

    public function creador()
    {
        return $this->belongsTo(Usuario::class, 'creado_por');
    }

    public function registros()
    {
        return $this->hasMany(AlcantarillaRegistro::class, 'id_alcantarilla');
    }
}
