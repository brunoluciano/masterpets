<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;

class UserController extends Controller
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
        // dd($request->all());

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'tipo_usuario_id' => 'required',
            'sexo' => 'required',
            'endereco' => 'required',
            'numero' => ['required','min:1'],
            'complemento' => 'required',
            'cidade' => 'required',
            'estado_id' => 'required',
            'bairro' => 'required',
            'cep' => ['required','size:8'],
            'telefone' => 'required',
            'nascimento' => 'required',
            'cpf' => ['required','size:11'],
        ]);

        $senha = Hash::make($request['password']);

        $usuario = new User();
        $usuario->name = $request->get('name');
        $usuario->email = $request->get('email');
        $usuario->password = $senha;
        $usuario->tipo_usuario_id = $request->get('tipo_usuario_id');
        $usuario->sexo = $request->get('sexo');
        $usuario->endereco = $request->get('endereco');
        $usuario->numero = $request->get('numero');
        $usuario->complemento = $request->get('complemento');
        $usuario->cidade = $request->get('cidade');
        $usuario->estado_id = $request->get('estado_id');
        $usuario->bairro = $request->get('bairro');
        $usuario->cep = $request->get('cep');
        $usuario->telefone = $request->get('telefone');
        $usuario->nascimento = $request->get('nascimento');
        $usuario->cpf = $request->get('cpf');

        $usuario->save();
        // User::create($request);

        return redirect()->route('cadastros')
                         ->with('success','O usuário '.$usuario->name.' foi inserido com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
