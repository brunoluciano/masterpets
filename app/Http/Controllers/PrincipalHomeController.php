<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalHomeController extends Controller
{
    public function index() {
        if(\Gate::allows('isCliente')){
            abort(403, "Desculpe, você não tem acesso a essa página!");
        } else {
            return view('sistema.principal.home');
        }
    }
}
