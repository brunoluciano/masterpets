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

    public function pet()
    {
        return $this->belongsTo('App\Animal');
    }

    public function servico()
    {
        return $this->belongsTo('App\Servico', 'evento_id');
    }
}
