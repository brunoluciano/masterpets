<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $table = "servicos";

    protected $fillable = [
        'descricao', 'tipo_servico_id', 'valor'
    ];

    public function tipo_servico() {
        return $this->belongsTo('App\TipoServico');
    }
}
