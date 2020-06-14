<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Produto;
use App\Servico;
use App\User;
use Illuminate\Http\Request;

class PesquisaController extends Controller
{
    public function index()
    {
        $usuarios = User::orderBy('name','asc')->get();
        $pets = Animal::orderBy('nome','asc')->get();
        $produtos = Produto::orderBy('descricao','asc')->get();
        $servicos = Servico::orderBy('descricao','asc')->get();

        return view('sistema.principal.pesquisa.home', compact('usuarios','pets','produtos','servicos'));
    }
}
