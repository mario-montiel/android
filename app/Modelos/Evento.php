<?php

namespace App\Modelos;
//use App\Modelos\Taller;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = "eventos";
    protected $primaryKey = "id_evento";
    public $timestamps = false;

    public function talleres(){
        return $this->belongsToMany(Taller::class, 'talleres_has_eventos', 'eventos_id_evento', 'tallleres_id_taller')->withPivot('nombre', 'evento', 'taller');
    }
}
