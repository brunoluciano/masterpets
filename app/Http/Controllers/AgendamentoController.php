<?php

namespace App\Http\Controllers;

use App\Agendamento;
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

            // $hora_indisponivel = array('horario' => '');
            foreach ($agendamentos as $agenda) {
                $agenda->hora_inicio = Carbon::parse($agenda->hora_inicio)->format('H:i');
                $hora_indisponivel[] = array('horario' => $agenda->hora_inicio, 'disponivel' => false);
            }
            // dd($hora_indisponivel);

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
