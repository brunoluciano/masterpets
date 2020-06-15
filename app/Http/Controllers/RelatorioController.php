<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;

class RelatorioController extends Controller
{
    public function index(){
        return view('sistema.principal.relatorios.home');
    }

    public function clientesCompras(){
        $options = new Options();
        $options->set('isRemoteEnabled', TRUE);
        $dompdf = new Dompdf($options);

        $hoje = Carbon::now();

        $pdfComprasClientes = PDF::loadView('sistema.principal.relatorios.paginas.testepdf');

        return $pdfComprasClientes->setPaper('a4')->stream('relatorioComprasClientes'.$hoje.'.pdf', array('Attachment' => 0));

    }
}
