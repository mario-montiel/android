<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = "eventos";
    protected $primaryKey = "id_evento";
    public $timestamps = false;
}
