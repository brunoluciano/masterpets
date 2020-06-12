<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'vendas';

    protected $fillable = [
        'vendedor_id', 'cliente_id', 'tipo_pagamento_id', 'horario_venda', 'total_pago', 'troco',
        'total_venda'
    ];

    public function vendedor() {
        return $this->belongsTo('App\User');
    }

    public function cliente() {
        return $this->belongsTo('App\User');
    }

    public function tipo_pagamento() {
        return $this->belongsTo('App\TipoPagamento');
    }



}
