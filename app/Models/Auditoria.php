<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{
    protected $table = 'auditoria';
    protected $primaryKey = 'id_auditoria';
    public $timestamps = false;
    protected $fillable = [
        'entidad',
        'id_entidad',
        'accion',
        'usuario_id',
        'detalles'
    ];
}
