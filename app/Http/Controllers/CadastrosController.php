<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Especie;
use App\Estado;
use App\TipoServico;
use App\TipoProduto;
use App\UnidadeMedida;

class CadastrosController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $estados = Estado::orderby('uf')->get();
        $especies = Especie::get();
        $tiposervicos = TipoServico::get();

        $tipoprodutos = TipoProduto::get();
        $unidademedidas = UnidadeMedida::get();

        return view('sistema.principal.cadastros.index',
               compact('especies', 'estados', 'tiposervicos', 'tipoprodutos', 'unidademedidas'));
    }
}
