<?php

namespace App\Http\Controllers;

use App\Agendamento;
use App\Servico;
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
            $cont = 0;
            for ($i=8; $i <= 18; $i++) { 
                $horario[$cont] = array('hora' => Carbon::parse($hora)->format('H:i'));

                $hora_indisponivel[] = array('horario' => $horario[$cont]['hora'], 'disponivel' => true);
                $hora = $hora->addHour(1);
                $cont++;
            }

            foreach ($horario as $hora) {
                foreach ($agendamentos as $agenda) {
                    $agenda->hora_inicio = Carbon::parse($agenda->hora_inicio)->format('H:i');
                    if($agenda->hora_inicio == $hora['hora']){
                        $h = Carbon::parse($agenda->hora_inicio)->format('H');
                        $hora_indisponivel[$h-8] = array('horario' => $agenda->hora_inicio, 'disponivel' => false);
                    }
                }
            }

            $hora_indisponivel = array_reverse($hora_indisponivel);

            // dd($hora_indisponivel);

            return response()->json([
                'success' => true,
                'agendamentos' => $agendamentos,
                'indisponivel' => $hora_indisponivel,
            ]);
        }
    }

    public function getEventos()
    {
        $eventos = Servico::orderBy('descricao', 'asc')->get();
        return response()->json($eventos);
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
