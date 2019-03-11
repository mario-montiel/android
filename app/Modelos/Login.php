<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = "usuarios";
    protected $primarykey = "id_usuario";
    public $timestamps = false;
}
