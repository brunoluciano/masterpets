<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemVenda extends Model
{
    protected $table = 'itensvendas';

    protected $fillable = [
        'produto_id', 'venda_id', 'vendedor_id', 'quantidade', 'total'
    ];

    public function produto() {
        return $this->belongsTo('App\Produto');
    }

    public function venda() {
        return $this->belongsTo('App\Venda');
    }
}
