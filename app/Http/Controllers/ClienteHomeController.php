<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Animal;
use App\Porte;
use App\Pelo;

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

            return view('sistema.cliente.home', compact('cliente',
            'petsHome', 'petsLista', 'possuiPet', 'portes', 'pelos'));
        }
    }
}
