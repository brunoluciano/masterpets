<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class EstoqueController extends Controller
{
    public function index()
    {
        $produtos = Produto::orderBy('descricao','asc')->get();

        $faltaProdutos = Produto::whereBetween('estoque_atual',[0,'estoque_minimo'])->get();

        return view('sistema.principal.estoque.home', compact('produtos','faltaProdutos'));
    }

    public function atualizarEntrada(Request $request, $id){
        // dd($request->all());
        $request->validate([
            'produto_id' => 'required',
            'estoque_minimo' => 'required|min:1',
            'estoque_maximo' => 'required|min:1',
            'estoque_atual' => 'required|min:1',
        ]);

        $produto_descricao = $request->input('produto');

        $produto = Produto::find($id);
        $produto->id = $id;
        $produto->estoque_minimo = $request->input('estoque_minimo');
        $produto->estoque_maximo = $request->input('estoque_maximo');
        $produto->estoque_atual = $request->input('estoque_atual');

        // dd($produto);
        $produto->save();

        return redirect()->route('estoque.index')
                         ->with('success','A entrada do produto '.$produto_descricao.' foi realizada com sucesso!');

    }

    public function getProdutos()
    {
        $p = Produto::orderBy('descricao','asc')->get();

        return response()->json($p);
    }
}
