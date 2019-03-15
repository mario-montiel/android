<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Tipo_Taller extends Model
{
    protected $table = "tipos_taller";
    protected $primaryKey = "id_tipotaller";
    public $timestamps = false;
}
