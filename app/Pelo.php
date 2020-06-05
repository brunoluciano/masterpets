<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelo extends Model
{
    protected $table = "pelos";

    protected $fillable = [
        'descricao'
    ];
}
