<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Especie;
use App\Raca;
use App\Cor;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
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
        // var_dump($request->file('imgPet'),$request->all());
        // var_dump($request->file('imgPet'));

        $request->validate([
            'nome' => 'required',
            'especie_id' => 'required',
            'dono_id' => 'required',
            'nascimento' => 'required',
            'raca_predominante_id' => 'required',
            'porte_id' => 'required',
            'cor_predominante_id' => 'required',
            'pelo_id' => 'required',
            'alergias' => 'max:250',
            'observacoes' => 'max:250',
            'sexo' => 'required',
        ]);

        $dono_id = $request->input('dono_id');


        $requestData = $request->all();
        if(!$request->file() == null) {
            $requestData['path_img'] = $request->file('imgPet')->store('cliente/'. $dono_id . '/pets');
        } else {
            $requestData['path_img'] = "animal/animalDefault.jpg";
        }
        

        Animal::create($requestData);

        // $animalImg = new Animal();
        // $animalImg->path_img = $request->file('imgPet')->store('cliente/'. $dono_id . '/pets');
        // $animalImg->save();

        $nome = $request->input('nome');

        return redirect()->route('cliente')
                         ->with('success','O PET '.$nome.' foi inserido com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getEspecie() {
        $e = Especie::all();
        return response()->json($e);
    }

    public function getRacas() {
        $r = Raca::all();
        return response()->json($r);
    }

    public function getCores() {
        $c = Cor::all();
        return response()->json($c);
    }
}
