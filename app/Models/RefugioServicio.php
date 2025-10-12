<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefugioServicio extends Model
{
    protected $table = 'refugios_servicios';
    protected $primaryKey = 'id_servicio';
    public $timestamps = false;

    protected $fillable = ['nombre', 'descripcion'];

    public function refugios()
    {
        return $this->belongsToMany(
            Refugio::class,
            'refugios_servicios_rel',
            'id_servicio',
            'id_refugio'
        )->withPivot('disponible');
    }
}
