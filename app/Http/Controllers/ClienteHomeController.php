<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Animal;
use App\Porte;
use App\Pelo;
use App\Venda;

use App\User;

class ClienteHomeController extends Controller
{
    public function index() {
        if(!\Gate::allows('isCliente')){
            abort(403, "Desculpe, você não tem acesso a essa página!");
        } else {
            $cliente = \Auth::user();

            $portes = Porte::get();
            $pelos = Pelo::get();

            $petsHome = Animal::where('dono_id', '=', $cliente->id)->orderby('nome')->take(2)->get();
            $petsLista = Animal::where('dono_id', '=', $cliente->id)->orderby('nome')->get();
            $possuiPet = $petsLista->count() > 0 ? true : false;

            $compras = Venda::where('cliente_id','=',$cliente->id)->orderBy('id','desc')->get();

            return view('sistema.cliente.home', compact('cliente',
            'petsHome', 'petsLista', 'possuiPet', 'portes', 'pelos',
            'compras'));
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
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

        User::findOrFail($id)->update($request->all());

        return redirect()->route('dashboard')
                         ->with('success','Perfil atualizado com sucesso!');
    }
}
