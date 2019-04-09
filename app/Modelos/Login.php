<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = "usuarios";
    protected $primaryKey = "id_usuario";
    protected $dateFormat = 'Y-m-d H:i:s';
    public $timestamps = true;
    protected $guarded = ['api_token'];
    
    /*protected function getDateFormat()
    {
        return 'd.m.Y H:i:s';
    }*/
}
