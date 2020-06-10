<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Marca;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // var_dump($request->file('imgPet'),$request->all());
        // var_dump($request->file('imgPet'));

        $request->validate([
            'descricao' => 'required',
            'tipo_id' => 'required',
            'marca_id' => 'required',
            'unidade' => 'required',
            'unidade_medida_id' => 'required',
            'estoque_minimo' => 'required',
            'estoque_maximo' => 'required',
            'estoque_atual' => 'required',
        ]);

        $descricao = $request->input('descricao');
        // $produto_id = Produto::order_by('id', 'desc')->first();

        $requestData = $request->all();
        if(!$request->file() == null) {
            $time = Carbon::now('America/Sao_Paulo');
            $time = $time->format('Y-m-d_H-i-s');
            $requestData['path_img'] = $request->file('imgProduto')->store('produto/' . $descricao . '/' . $time);
        } else {
            $requestData['path_img'] = "produto/produtoDefault.jpg";
        }

        Produto::create($requestData);

        return redirect()->route('cadastros')
                         ->with('success','O produto '.$descricao.' foi inserido com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //
    }

    public function getMarca() {
        $m = Marca::all();
        return response()->json($m);
    }
}
