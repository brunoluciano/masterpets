<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ClienteHomeController extends Controller
{
    public function index() {
        if(!\Gate::allows('isCliente')){
            abort(403, "Desculpe, você não tem acesso a essa página!");
        } else {
            $cliente = \Auth::user();
            return view('sistema.cliente.home', compact('cliente'));
        }
    }
}
