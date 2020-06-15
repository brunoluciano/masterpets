<?php

namespace App\Http\Controllers;

use App\Venda;
use App\Produto;
use App\User;
use App\ItemVenda;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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

        $total_venda = ItemVenda::where('vendedor_id','=',$user->id)
                                ->where('venda_id','=',null)->sum('total');
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

    public function confirmarVenda(Request $request)
    {
        $request->validate([
            'cliente_id' => ['required'],
        ]);

        $user = \Auth::user();

        $venda = new Venda();
        $venda->vendedor_id = $user->id;
        $venda->cliente_id = $request->input('cliente_id');
        $venda->horario_venda = date('Y-m-d H:i:s');
        $venda->total_venda = ItemVenda::where('vendedor_id','=',$user->id)
                                       ->where('venda_id','=',null)->sum('total');
        $venda->save();

        $itens_carrinho = ItemVenda::where('vendedor_id','=',$user->id)
                                   ->where('venda_id','=',null)->get();

        foreach ($itens_carrinho as $item) {
            $item->venda_id = $venda->id;
            $item->save();
        }

        return redirect()->route('venda.finalizada');

    }

    public function addProduto(Request $request)
    {
        $request->validate([
            'quantidade' => ['required', 'min:1'],
        ]);

        $user = \Auth::user();

        // Receber dados da requisição
        $itemvenda = new ItemVenda();
        $itemvenda->produto_id = $request->input('produto_id');
        $itemvenda->vendedor_id = $user->id;
        $itemvenda->quantidade = $request->input('quantidade');

        // Pegar o registro do produto inserido no carrinho
        $produto = Produto::where('id', '=', $itemvenda->produto_id)->first();

        if($produto->estoque_atual != 0){ // Verifica no banco de dados se o respectivo produto está disponível em estoque
            // Fazer o cálculo do total do produto adicionado no carrinho
            $itemvenda->total = $itemvenda->quantidade * $produto->preco_venda;

            // Inserir no banco de dados o produto adicionado nos itens da venda
            $itemvenda->save();

            // Cálculo para atualizar a quantidade do produto no estoque atual
            $estoqueAtual = $produto->estoque_atual - $itemvenda->quantidade;
            $atualizarQtdProduto = Produto::where('id', '=', $itemvenda->produto_id)
                                        ->update(['estoque_atual' => $estoqueAtual]);

            // Recuperar novamente o produto atualizado
            $produto = Produto::where('id', '=', $itemvenda->produto_id)->first();

            // Recuperar todos os itens que estão no carrinho da compra de acordo com o usuário (vendedor) logado
            $item_carrinho = ItemVenda::where('vendedor_id','=',$user->id)
                                    ->orderBy('id','desc')->with('produto')->first();

            // Cálculo para somar o total da venda
            $total_venda = ItemVenda::where('vendedor_id','=',$user->id)
                                    ->where('venda_id','=',null)->sum('total');
            $total_venda = number_format($total_venda, 2, ',', '.');

            if ($itemvenda) {
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'O produto '.$produto->descricao.' foi inserido no carrinho',
                        'produtos' => $item_carrinho,
                        'total_venda' => $total_venda,
                        'atualizar_qtd_produto' => $produto->estoque_atual,
                    ]
                );
            }
        }
    }

    public function remProduto($id)
    {
        // Pega o usuário logado
        $user = \Auth::user();

        // Cria uma váriavel com os produtos que estão em aberto no carrinho de compras
        $item = ItemVenda::where('vendedor_id','=',$user->id)
                         ->where('id','=',$id)->first();

        // Atualizar na tabela produto o item que foi removido. A quantidade do produto do estoque atual será o mesmo como antes da inserção
        $produto = Produto::where('id', '=', $item->produto_id)->first();
        $estoqueAtual = $produto->estoque_atual + $item->quantidade;
        Produto::where('id', '=', $item->produto_id)
               ->update(['estoque_atual' => $estoqueAtual]);

        // Remover item do carrinho
        $item->delete();

        // Cálculo para atualizar a soma total da venda
        $total_venda = ItemVenda::where('vendedor_id','=',$user->id)
                                ->where('venda_id','=',null)->sum('total');
        $total_venda = number_format($total_venda, 2, ',', '.');

        return response()->json(
            [
                'success' => true,
                'message' => 'O produto '.$produto->descricao.' foi removido do carrinho',
                'total_venda' => $total_venda,
            ]
        );
    }

    public function cancelarVenda()
    {
        // Pega o usuário logado
        $user = \Auth::user();

        // Cria uma váriavel com os produtos que estão em aberto no carrinho de compras
        $itens_carrinho = ItemVenda::where('vendedor_id','=',$user->id)
                                   ->where('venda_id','=',null)->get();

        foreach ($itens_carrinho as $item) {
            // Atualizar na tabela produto os itens que foram adicionados. A quantidade dos produtos do estoque atual dos produtos serão os mesmos como antes da venda
            $produto = Produto::where('id', '=', $item->produto_id)->first();
            $estoqueAtual = $produto->estoque_atual + $item->quantidade;
            Produto::where('id', '=', $item->produto_id)
                   ->update(['estoque_atual' => $estoqueAtual]);

            // Excluir itens da venda cancelada
            $item->delete();
        }

        return redirect()->route('dashboard');
    }

    public function getProdutos() {
        $p = Produto::orderBy('descricao', 'asc')->get();
        return response()->json($p);
    }

    public function getClientes() {
        $c = User::where('tipo_usuario_id','=',1)->get();
        return response()->json($c);
    }
}
