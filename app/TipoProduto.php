<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProduto extends Model
{
    protected $table = "tipoprodutos";

    protected $fillable = [
        'descricao'
    ];
}
