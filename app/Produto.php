<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = "produtos";

    protected $fillable = [
        'descricao', 'categoria_id', 'marca_id', 'tipo_id', 'unidade_medida_id',
        'unidade', 'cod_barras', 'estoque_minimo', 'estoque_maximo', 'estoque_atual',
        'preco_compra', 'preco_venda', 'path_img'
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function marca()
    {
        return $this->belongsTo('App\Marca');
    }

    public function tipo_produto()
    {
        return $this->belongsTo('App\TipoProduto');
    }

    public function unidade_medida()
    {
        return $this->belongsTo('App\UnidadeMedida');
    }
}
