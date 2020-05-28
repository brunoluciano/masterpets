<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(\Gate::allows('isCliente')) {
            // return view('sistema.cliente.home');
            return redirect()->route('cliente');
        } else {
            // return view('sistema.principal.home');
            return redirect()->route('dashboard');
        }
        // return view('home');
    }
}
