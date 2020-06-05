<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = "animais";

    protected $fillable = [
        'nome', 'dono_id', 'nascimento', 'sexo', 'especie_id', 'raca_predominante_id',
        'raca_secundaria_id', 'porte_id', 'cor_predominante_id', 'cor_secundaria_id', 'pelo_id',
        'alergias', 'observacoes', 'vivo', 'agressivo', 'apto_reproduzir', 'path_img'
    ];

    public function dono() {
        return $this->belongsTo('App\User');
    }

    public function especie() {
        return $this->belongsTo('App\Especie');
    }

    public function raca_predominante() {
        return $this->belongsTo('App\Raca');
    }

    public function raca_secundaria() {
        return $this->belongsTo('App\Raca');
    }

    public function porte() {
        return $this->belongsTo('App\Porte');
    }

    public function cor_predominante() {
        return $this->belongsTo('App\Cor');
    }

    public function cor_secundaria() {
        return $this->belongsTo('App\Cor');
    }

    public function pelo() {
        return $this->belongsTo('App\Pelo');
    }
}
