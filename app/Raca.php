<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raca extends Model
{
    protected $table = "racas";

    protected $fillable = [
        'nome', 'especie_id'
    ];

    public function especie() {
        return $this->belongsTo('App\Especie');
    }
}
