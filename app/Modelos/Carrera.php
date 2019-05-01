<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = "carreras";
    protected $primaryKey = "id_carrera";
    public $timestamps = false;
}
