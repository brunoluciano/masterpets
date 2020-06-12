<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPagamento extends Model
{
    protected $table = 'tipopagamentos';

    protected $fillable = [
        'descricao'
    ];
}
