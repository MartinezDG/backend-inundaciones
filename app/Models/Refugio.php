<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refugio extends Model
{
    protected $table = 'refugios';
    protected $primaryKey = 'id_refugio';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'direccion',
        'capacidad',
        'geom',
        'activo',
        'municipio_id',   // asegurarte que exista en la tabla
        'estado_refugio_id'
    ];

    // Ocultamos geom para evitar errores de JSON
    protected $hidden = ['geom'];

    // Atributos legibles para JSON
    protected $appends = ['latitud', 'longitud'];

    public function getLatitudAttribute()
    {
        if (!$this->geom) return null;
        $point = unpack('x/x/x/x/d2', $this->geom); 
        return $point[2] ?? null;
    }

    public function getLongitudAttribute()
    {
        if (!$this->geom) return null;
        $point = unpack('x/x/x/x/d2', $this->geom);
        return $point[1] ?? null;
    }

    // Relaciones
    public function servicios()
    {
        return $this->hasMany(RefugioServicioRel::class, 'id_refugio');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }

    public function estadoRefugio()
    {
        return $this->belongsTo(EstadoRefugio::class, 'estado_refugio_id');
    }
}
