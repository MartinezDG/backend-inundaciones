<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReporteVerificacion extends Model
{
    protected $table = 'reportes_verificacion';
    protected $primaryKey = 'id_verificacion';
    public $timestamps = false;
    protected $fillable = [
        'id_reporte',
        'id_usuario_verificador',
        'estado_anterior_id',
        'estado_nuevo_id',
        'comentarios'
    ];
}
