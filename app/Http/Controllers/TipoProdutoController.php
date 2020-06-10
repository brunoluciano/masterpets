<?php

namespace App\Http\Controllers;

use App\TipoProduto;
use Illuminate\Http\Request;

class TipoProdutoController extends Controller
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
        $request->validate([
            'descricao' => 'required'
        ]);

        TipoProduto::create($request->all());
        $tipoproduto = $request->input('descricao');

        return redirect()->route('cadastros')
                        ->with('success','Tipo de produto '.$tipoproduto.' inserido com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoProduto  $tipoProduto
     * @return \Illuminate\Http\Response
     */
    public function show(TipoProduto $tipoProduto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoProduto  $tipoProduto
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoProduto $tipoProduto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoProduto  $tipoProduto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoProduto $tipoProduto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoProduto  $tipoProduto
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoProduto $tipoProduto)
    {
        //
    }
}
