<?php

namespace App\Http\Controllers;

use App\Agendamento;
use App\Animal;
use App\Servico;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class AgendamentoController extends Controller
{

    public function index()
    {
        $cliente = \Auth::user();

        $petsLista = Animal::where('dono_id', '=', $cliente->id)->orderby('nome')->get();

        return view('sistema.principal.agenda.home', compact('petsLista'));
    }

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

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'data_evento_modal' => 'required',
            'horario_evento_modal' => 'required',
            'animal_id' => 'required',
            'evento_id' => 'required',
            'observacao' => 'max:250'
        ]);

        $user = \Auth::user();

        $agendamento = new Agendamento();
        $agendamento->usuario_id = $user->id;
        $agendamento->pet_id = $request->input('animal_id');
        $agendamento->evento_id = $request->input('evento_id');
        $agendamento->data_evento = $request->input('data_evento_modal');
        $agendamento->hora_inicio = $request->input('horario_evento_modal');
        $agendamento->observacoes = $request->input('observacao');
        $agendamento->save();

        $data = Carbon::parse($agendamento->data_evento)->format('d/m/Y');
        return redirect()->route('cadastros')
                         ->with('success','Agendamento para o dia '.$data.' marcado com sucesso!');
    }
}
