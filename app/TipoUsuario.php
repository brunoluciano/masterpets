<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = 'tipousuarios';

    protected $fillable = [
        'descricao'
    ];
}
