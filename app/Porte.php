<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Porte extends Model
{
    protected $table = "portes";

    protected $fillable = [
        'descricao'
    ];
}
