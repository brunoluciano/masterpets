<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProdutoHomeController extends Controller
{
    public function index()
    {
        $produtosLancamento = Produto::orderBy('id','desc')->take(5)->get();

        $produtosAll = Produto::get();

        return view('website.produtos', compact('produtosLancamento', 'produtosAll'));
    }
}
