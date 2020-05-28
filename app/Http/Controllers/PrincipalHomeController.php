<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalHomeController extends Controller
{
    public function index() {
        return view('sistema.principal.home');
    }
}
