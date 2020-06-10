<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadeMedida extends Model
{
    protected $table = "unidademedidas";

    protected $fillable = [
        'descricao', 'abreviacao'
    ];
}
