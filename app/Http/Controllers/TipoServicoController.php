<?php

namespace App\Http\Controllers;

use App\TipoServico;
use Illuminate\Http\Request;

class TipoServicoController extends Controller
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

        TipoServico::create($request->all());
        $tiposervico = $request->input('descricao');

        return redirect()->route('cadastros')
                         ->with('success','Tipo de serviço '.$tiposervico.' inserido com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TipoServico  $tipoServico
     * @return \Illuminate\Http\Response
     */
    public function show(TipoServico $tipoServico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoServico  $tipoServico
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoServico $tipoServico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoServico  $tipoServico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoServico $tipoServico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoServico  $tipoServico
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoServico $tipoServico)
    {
        //
    }
}
