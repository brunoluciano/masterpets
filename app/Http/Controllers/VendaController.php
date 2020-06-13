<?php

namespace App\Http\Controllers;

use App\Venda;
use App\Produto;
use App\User;
use App\ItemVenda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();

        $itens_carrinho = ItemVenda::where('vendedor_id','=',$user->id)
                                   ->where('venda_id','=',null)
                                   ->orderBy('id','desc')->get();

        $total_venda = ItemVenda::where('vendedor_id','=',$user->id)->sum('total');
        $total_venda = number_format($total_venda, 2, ',', '.');

        return view('sistema.principal.venda.home', compact('user', 'itens_carrinho', 'total_venda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function show(Venda $venda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function edit(Venda $venda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venda $venda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venda $venda)
    {
        //
    }

    public function addProduto(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'quantidade' => ['required', 'min:1'],
        ]);

        $user = \Auth::user();

        $itemvenda = new ItemVenda();
        $itemvenda->produto_id = $request->input('produto_id');
        $itemvenda->vendedor_id = $user->id;
        $itemvenda->quantidade = $request->input('quantidade');

        $produto = Produto::where('id', '=', $itemvenda->produto_id)->first();
        $itemvenda->total = $itemvenda->quantidade * $produto->preco_venda;

        $itemvenda->save();

        $item_carrinho = ItemVenda::where('vendedor_id','=',$user->id)
                                   ->orderBy('id','desc')->with('produto')->first();

        $total_venda = ItemVenda::where('vendedor_id','=',$user->id)->sum('total');
        $total_venda = number_format($total_venda, 2, ',', '.');

        if ($itemvenda) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'O produto '.$produto->descricao.' foi inserido no carrinho',
                    'produtos' => $item_carrinho,
                    'total_venda' => $total_venda
                ]
            );
        }
    }

    public function cancelarVenda()
    {
        $user = \Auth::user();

        $itens_carrinho = ItemVenda::where('vendedor_id','=',$user->id)
                                   ->where('venda_id','=',null)->get();

        foreach ($itens_carrinho as $item) {
            $item->delete();
        }

        return view('sistema.principal.home');
    }

    public function getProdutos() {
        $p = Produto::orderBy('descricao', 'asc')->get();
        return response()->json($p);
    }

    public function getClientes() {
        $c = User::where('tipo_usuario_id','=',1)->get();
        // $c = User::all();
        return response()->json($c);
    }
}
