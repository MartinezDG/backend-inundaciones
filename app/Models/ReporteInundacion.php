<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReporteInundacion extends Model
{
    protected $table = 'reportes_inundacion';
    protected $primaryKey = 'id_reporte';
    public $timestamps = false;

    protected $fillable = [
        'id_usuario',
        'id_municipio',
        'estado_reporte_id',
        'nivel_afectacion',
        'metodo_origen',
        'fecha_suceso',
        'prioridad',
        'geom',
        'direccion_texto',
        'verificado_por'
    ];

    // Ocultamos geom para evitar errores de JSON
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
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'id_municipio');
    }

    public function estadoReporte()
    {
        return $this->belongsTo(EstadoReporte::class, 'estado_reporte_id');
    }

    public function verificador()
    {
        return $this->belongsTo(Usuario::class, 'verificado_por');
    }
}
