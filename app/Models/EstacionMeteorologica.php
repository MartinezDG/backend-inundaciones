<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstacionMeteorologica extends Model
{
    protected $table = 'estaciones_meteorologicas';
    protected $primaryKey = 'id_estacion';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'codigo',
        'id_municipio',
        'latitud',
        'longitud',
        'elevacion',
        'geom',
        'activa',
        'fuente_datos',
        'creado_por'
    ];

    // Ocultamos geom porque no se puede enviar a JSON directamente
    protected $hidden = ['geom'];

    // Creamos atributos adicionales que se agregarán al JSON
    protected $appends = ['latitud_json', 'longitud_json'];

    public function getLatitudJsonAttribute()
    {
        return $this->latitud;
    }

    public function getLongitudJsonAttribute()
    {
        return $this->longitud;
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
        return $this->hasMany(LluviaRegistro::class, 'id_estacion');
    }
}
