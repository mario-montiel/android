<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Tipo_Persona extends Model
{
    protected $table = "tipos_personas";
    protected $primaryKey = "id_tipo_persona";
    public $timestamps = false;
}
