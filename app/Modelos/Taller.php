<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    protected $table = "talleres";
    protected $primarykey = "id_taller";
    public $timestamps = false;
}
