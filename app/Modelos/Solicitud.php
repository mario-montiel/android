<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = "solicitudes";
    protected $primaryKey = "id_solicitudes";
    public $timestamps = false;
}
