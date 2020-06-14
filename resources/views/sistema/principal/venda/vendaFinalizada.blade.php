@extends('layouts.sistema')

@section('content')
<div class="container">
    <div class="row mx-3 mt-4">
        <br><br><br>
        <div class="bg-pdv-gradient z-depth-3 rounded white-text p-2">
            <div class="row pt-3">
                <div class="col s12 center-align p-3">
                    <i class="fas fa-shopping-basket fa-10x"></i>
                    <h2 class="green-text text-accent-2 font-weight-light mt-0">VENDA FINALIZADA COM SUCESSO</h2>
                </div>
            </div>
            <div class="row">
                <div class="col l4 s12">
                    <a href="{{ route('venda.index') }}" class="waves-effect waves-light btn btn-block hoverable text-shadow">Iniciar Nova Venda</a>
                </div>
                <div class="col l4 s12">
                    <a href="#" class="waves-effect waves-light btn btn-block orange lighten-2 hoverable text-shadow">Gerar Recibo</a>
                </div>
                <div class="col l4 s12">
                    <a href="{{ route('dashboard') }}" class="waves-effect waves-light btn btn-block grey lighten-1 hoverable text-shadow">Voltar</a>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection
