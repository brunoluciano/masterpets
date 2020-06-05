<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoServico extends Model
{
    protected $table = "tiposervicos";

    protected $fillable = [
        'descricao'
    ];
}
