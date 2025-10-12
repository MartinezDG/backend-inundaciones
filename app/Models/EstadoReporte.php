<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoReporte extends Model
{
    protected $table = 'estados_reporte';
    protected $primaryKey = 'id_estado';
    public $timestamps = false;
    protected $fillable = ['codigo', 'descripcion'];
}
