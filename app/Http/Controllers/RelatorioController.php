<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

use App\Venda;
use App\Produto;

class RelatorioController extends Controller
{
    public function index(){
        return view('sistema.principal.relatorios.home');
    }

    public function clientesCompras(Request $request){
        // dd($request->all());
        $desde = $request->input('desde');
        $ate = $request->input('ate');

        if($request->input('porperiodo') != null){
            if($desde != null &&  $ate != null){
                $porperiodo = true;
                $vendas = Venda::whereBetween('horario_venda',[$desde,$ate])->get();
                $desde = Carbon::parse($desde)->format('d/m/Y');
                $ate = Carbon::parse($ate)->format('d/m/Y');
            } else {
                $porperiodo = false;
                $vendas = Venda::get();
            }
        } else {
            $porperiodo = false;
            $vendas = Venda::get();
        }
        $somaTotal = $vendas->sum('total_venda');
        $somaTotal = number_format($somaTotal,2,',','.');

        // dd($vendas);

        $pdfComprasClientes = PDF::loadView('sistema.principal.relatorios.paginas.comprasclientes', compact('vendas','porperiodo','desde','ate','somaTotal'));

        $hoje = Carbon::now();
        return $pdfComprasClientes->setPaper('a4')->stream('relatorioComprasClientes'.$hoje.'.pdf', array('Attachment' => 0));
    }

    public function clientesAssiduidade(Request $request){
        $desde = $request->input('desde');
        $ate = $request->input('ate');

        if($request->input('porperiodo') != null){
            if($desde != null &&  $ate != null){
                $porperiodo = true;
                $assiduidade = Venda::select('cliente_id')
                                    ->selectRaw('COUNT(*) AS count')
                                    ->groupBy('cliente_id')
                                    ->orderByDesc('count')
                                    ->whereBetween('horario_venda',[$desde,$ate])->get();
                $desde = Carbon::parse($desde)->format('d/m/Y');
                $ate = Carbon::parse($ate)->format('d/m/Y');
            } else {
                $porperiodo = false;
                $assiduidade = Venda::select('cliente_id')
                                    ->selectRaw('COUNT(*) AS count')
                                    ->groupBy('cliente_id')
                                    ->orderByDesc('count')
                                    ->get();
            }
        } else {
            $porperiodo = false;
            $assiduidade = Venda::select('cliente_id')
                                ->selectRaw('COUNT(cliente_id) AS count')
                                ->groupBy('cliente_id')
                                ->orderByDesc('count')
                                ->get();

        }
        $qtdVendas = $assiduidade->sum('count');


        $pdfAssiduidadeClientes = PDF::loadView('sistema.principal.relatorios.paginas.assiduidadeclientes', compact('assiduidade','porperiodo','desde','ate','qtdVendas'));

        $hoje = Carbon::now();
        return $pdfAssiduidadeClientes->setPaper('a4')->stream('relatorioAssiduidadeClientes'.$hoje.'.pdf', array('Attachment' => 0));
    }

    public function funcionariosVendas(Request $request){
        $desde = $request->input('desde');
        $ate = $request->input('ate');

        if($request->input('porperiodo') != null){
            if($desde != null &&  $ate != null){
                $porperiodo = true;
                $vendasFuncionarios = Venda::whereBetween('horario_venda',[$desde,$ate])
                                    ->orderBy('horario_venda')->get();
                $desde = Carbon::parse($desde)->format('d/m/Y');
                $ate = Carbon::parse($ate)->format('d/m/Y');
            } else {
                $porperiodo = false;
                $vendasFuncionarios = Venda::orderBy('horario_venda')->get();
            }
        } else {
            $porperiodo = false;
            $vendasFuncionarios = Venda::orderBy('horario_venda')->get();
        }
        $valorTotal = $vendasFuncionarios->sum('total_venda');
        $valorTotal = number_format($valorTotal,2,',','.');

        $pdfVendasFuncionarios = PDF::loadView('sistema.principal.relatorios.paginas.vendasfuncionarios', compact('vendasFuncionarios','porperiodo','desde','ate','valorTotal'));

        $hoje = Carbon::now();
        return $pdfVendasFuncionarios->setPaper('a4')->stream('relatorioVendasFuncionarios'.$hoje.'.pdf', array('Attachment' => 0));
    }

    public function financeiroLucro(Request $request){
        $desde = $request->input('desde');
        $ate = $request->input('ate');

        if($request->input('porperiodo') != null){
            if($desde != null &&  $ate != null){
                $porperiodo = true;
                $lucro = Venda::whereBetween('horario_venda',[$desde,$ate])->sum('total_venda');
                $qtdVendas = Venda::whereBetween('horario_venda',[$desde,$ate])->count();
                $desde = Carbon::parse($desde)->format('d/m/Y');
                $ate = Carbon::parse($ate)->format('d/m/Y');
            } else {
                $porperiodo = false;
                $lucro = Venda::sum('total_venda');
                $qtdVendas = Venda::count();
            }
        } else {
            $porperiodo = false;
            $lucro = Venda::sum('total_venda');
            $qtdVendas = Venda::count();
        }
        $lucro = number_format($lucro,2,',','.');

        $pdfLucroFinanceiro = PDF::loadView('sistema.principal.relatorios.paginas.lucrofinanceiro', compact('lucro','porperiodo','desde','ate','qtdVendas'));

        $hoje = Carbon::now();
        return $pdfLucroFinanceiro->setPaper('a4')->stream('relatorioLucroFinanceiro'.$hoje.'.pdf', array('Attachment' => 0));
    }

    public function estoqueProdutos(){
        $produtos = Produto::orderBy('descricao','asc')->get();
        $qtd = $produtos->count();

        $pdfEstoqueProdutos = PDF::loadView('sistema.principal.relatorios.paginas.produtosestoque', compact('produtos','qtd'));

        $hoje = Carbon::now();
        return $pdfEstoqueProdutos->setPaper('a4')->stream('relatorioProdutosEstoque'.$hoje.'.pdf', array('Attachment' => 0));
    }

    public function estoqueFalta(){
        $produtos = Produto::whereRaw('estoque_atual <= estoque_minimo')
                           ->orderBy('estoque_atual','asc')->get();
        $qtd = $produtos->count();

        $pdfEstoqueFalta = PDF::loadView('sistema.principal.relatorios.paginas.faltaestoque', compact('produtos','qtd'));

        $hoje = Carbon::now();
        return $pdfEstoqueFalta->setPaper('a4')->stream('relatorioFaltaEstoque'.$hoje.'.pdf', array('Attachment' => 0));
    }

    public function estoqueLancamentos(){
        $produtos = Produto::orderBy('updated_at','desc')->get();
        $qtd = $produtos->count();

        $pdfEstoqueProdutos = PDF::loadView('sistema.principal.relatorios.paginas.lancamentosestoque', compact('produtos','qtd'));

        $hoje = Carbon::now();
        return $pdfEstoqueProdutos->setPaper('a4')->stream('relatorioLancamentosEstoque'.$hoje.'.pdf', array('Attachment' => 0));
    }
}
