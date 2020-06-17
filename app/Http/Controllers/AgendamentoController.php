<?php

namespace App\Http\Controllers;

use App\Agendamento;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class AgendamentoController extends Controller
{

    public function getAgendamentos(Request $request)
    {
        setlocale(LC_TIME, 'ptb');
        $data_evento =  new Carbon($request->input('data_evento'));
        $data_evento = $data_evento->addDay(1);

        if($data_evento->isPast()){
            return response()->json([
                'success' => false,
            ]);
        } else {
            $agendamentos = Agendamento::where('data_evento','=',$data_evento->subDay(1))
                                       ->orderBy('hora_inicio', 'desc')->get();

            $teste = new Carbon('08:00');
            $hora = new Carbon('08:00');
            // dd($hora);
            for ($i=8; $i <= 18; $i++) { 
                // $horario .= array('hora' => $i);
                $horario[] = array('hora' => Carbon::parse($hora)->format('H:i'));
                if($hora == $teste){
                    echo "IGUAL";
                } else {
                    echo "nao igaul";
                }
                
                $hora = $hora->addHour(1);
            }
            // dd($horario);

            // $hora_indisponivel = array('horario' => '');
            $cont = 0;

            foreach ($horario as $hora) {
                foreach ($agendamentos as $agenda) {
                    if($hora->hora ){

                    }

                }

            }

            foreach ($agendamentos as $agenda) {
                while($horario[$cont]['hora'] < $agenda->hora_inicio){
                    $hora_indisponivel[] = array('horario' => $horario[$cont]['hora'], 'disponivel' => false);
                }
                $agenda->hora_inicio = Carbon::parse($agenda->hora_inicio)->format('H:i');
                $hora_indisponivel[] = array('horario' => $agenda->hora_inicio, 'disponivel' => false);
                
                $cont++;
            }
            dd($hora_indisponivel);

            return response()->json([
                'success' => true,
                'agendamentos' => $agendamentos,
                'indisponivel' => $hora_indisponivel,
            ]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function show(Agendamento $agendamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Agendamento $agendamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agendamento $agendamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agendamento $agendamento)
    {
        //
    }
}
