@extends('layouts.sistema')

@section('content')
    @can('isCliente')
    <div class="container py-4">
        <div class="row">
            <div class="col l5 p-4 rounded z-depth-2 card-info-user">
                <div class="row my-0">
                    <h4 class="m-0 pl-2">
                        <span class="grey-text text-darken-2 font-weight-light"><b>{{ $cliente->name }}</b></span>
                        <a href="#" class="waves-effect waves-light btn right mr-2">DETALHES</a>
                    </h4>

                </div>
                <br>
                <div class="row my-0 pl-2">
                    <div class="font-italic grey-text text-darken-2">
                        <p class="m-0">{{ $cliente->endereco }}</p>
                        <p class="m-0">{{ $cliente->bairro }}</p>
                        <p class="m-0">{{ $cliente->cidade }} - {{ $cliente->estado->uf }}</p>
                        <p class="m-0">{{ $cliente->endereco }}</p>
                    </div>
                </div>
            </div>
            <div class="col l6 offset-l1 p-4 rounded z-depth-2 card-info-user">
                <div class="row my-0 mb-3">
                    <h5 class="m-0 pl-2">
                        <span class="grey-text text-darken-2 font-weight-bold">Meus PETS</span>
                        <a href="#" class="waves-effect waves-light teal-text right mr-2"><i class="fas fa-plus"></i></a>
                    </h5>
                </div>
                <div class="row my-0 pl-2 mt-1">
                    <div class="row valign-wrappe my-1">
                        <div class="col l2">
                            <img src="{{ asset('images/cao.jpg') }}" class="circle responsive-img pet-img">
                        </div>
                        <div class="col l10">
                            <h6 class="mt-1">Ted
                                <a href="#" class="waves-effect waves-light btn btn-small right">DETALHES</a>
                            </h6>
                            <span>Canino • Poddle • 3 anos • 6 kg</span>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="row valign-wrappe my-1">
                        <div class="col l2">
                            <img src="{{ asset('images/gato.jpg') }}" class="circle responsive-img pet-img">
                        </div>
                        <div class="col l10">
                            <h6 class="mt-1">Ted
                                <a href="#" class="waves-effect waves-light btn btn-small right">DETALHES</a>
                            </h6>
                            <span>Canino • Poddle • 3 anos • 6 kg</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
@endsection
