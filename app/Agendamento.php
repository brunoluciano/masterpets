<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $table = 'agendamentos';

    protected $fillable = [
        'usuario_id', 'pet_id', 'evento_id', 'data_evento', 'hora_inicio', 'hora_termino', 'observacoes'
    ];

    public function usuario()
    {
        return $this->belongsTo('App\User');
    }
}
