<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Especie;
use App\Estado;

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

        return view('sistema.principal.cadastros.index', compact('especies', 'estados'));
    }
}
