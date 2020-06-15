<?php

namespace App\Http\Controllers;

use App\Venda;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FinanceiroController extends Controller
{
    public function index()
    {
        $hoje = Carbon::now()->format('d/m/Y');
        setlocale(LC_TIME, 'ptb'); // LC_TIME é formatação de data e hora com strftime()
        $mes = Carbon::now()->formatLocalized('%B');

        $lucroHoje = Venda::whereBetween('horario_venda', [Carbon::now()->subDay(1),Carbon::now()])->sum('total_venda');
        $lucroHoje = number_format($lucroHoje,2,',','.');
        $qtdVendasHoje = Venda::whereBetween('horario_venda', [Carbon::now()->subDay(1),Carbon::now()])->count();

        $lucroSemana = Venda::whereBetween('horario_venda', [Carbon::now()->subWeek(1),Carbon::now()])->sum('total_venda');
        $lucroSemana = number_format($lucroSemana,2,',','.');
        $qtdVendasSemana = Venda::whereBetween('horario_venda', [Carbon::now()->subWeek(1),Carbon::now()])->count();

        $lucroMes = Venda::whereBetween('horario_venda', [Carbon::now()->subMonth(1),Carbon::now()])->sum('total_venda');
        $lucroMes = number_format($lucroMes,2,',','.');
        $qtdVendasMes = Venda::whereBetween('horario_venda', [Carbon::now()->subMonth(1),Carbon::now()])->count();

        $vendas = Venda::orderBy('horario_venda','desc')->get();

        return view('sistema.principal.financeiro.home', compact('hoje','mes',
        'lucroHoje','qtdVendasHoje','lucroSemana','qtdVendasSemana','lucroMes','qtdVendasMes',
        'vendas'));
    }
}
