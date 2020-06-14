<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Venda;
use Carbon\Carbon;

class PrincipalHomeController extends Controller
{
    public function index() {
        if(\Gate::allows('isCliente')){
            abort(403, "Desculpe, você não tem acesso a essa página!");
        } else {
            $user = \Auth::user();

            $vendasHoje = Venda::where('vendedor_id','=',$user->id)
                               ->whereBetween('horario_venda', [Carbon::now()->subDay(1),Carbon::now()])->count();

            $vendasSemana = Venda::where('vendedor_id','=',$user->id)
                                 ->whereBetween('horario_venda', [Carbon::now()->subWeek(1),Carbon::now()])->count();

            $vendasMes = Venda::where('vendedor_id','=',$user->id)
                              ->whereBetween('horario_venda', [Carbon::now()->subMonth(1),Carbon::now()])->count();

            $totalVendas = Venda::where('vendedor_id','=',$user->id)->count();
            return view('sistema.principal.home', compact('user', 'vendasHoje', 'vendasSemana', 'vendasMes', 'totalVendas'));
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'sexo' => 'required',
            'endereco' => 'required',
            'numero' => ['required','min:1'],
            'complemento' => 'required',
            'cidade' => 'required',
            'estado_id' => 'required',
            'bairro' => 'required',
            'cep' => ['required','size:8'],
            'telefone' => 'required',
            'nascimento' => 'required',
            'cpf' => ['required','size:11'],
        ]);

        User::findOrFail($id)->update($request->all());

        return redirect()->route('cliente')
                         ->with('success','Perfil atualizado com sucesso!');
    }
}
