<?php

namespace App\Modelos;
use App\Modelos\Evento;

use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    protected $table = "talleres";
    protected $primaryKey = "id_taller";
    public $timestamps = false;

    public function eventos(){
        return $this->belongsToMany(Evento::class, 'tallleres_has_eventos', 'tallleres_id_taller', 'eventos_id_evento')->withPivot('nombre', 'taller', 'evento');
    }
}
