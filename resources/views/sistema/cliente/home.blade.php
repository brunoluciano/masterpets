@extends('layouts.sistema')

@section('content')
    @can('isCliente')
    <div class="container py-4">
        @if ($message = Session::get('success'))
            <div class="green">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="row">
            <div class="col l5 s12 p-4 rounded z-depth-2 card-info-user">
                <div class="row my-0">
                    <h4 class="m-0 pl-2">
                        <span class="teal-text text-darken-2 font-weight-light"><b>{{ $cliente->name }}</b></span>
                        <a href="#modalCliente" class="waves-effect waves-light btn right cyan darken-1 mr-2 modal-trigger">DETALHES</a>
                    </h4>
                </div>
                <br>
                <div class="row my-0 pl-2">
                    <div class="font-italic grey-text text-darken-2">
                        <p class="m-0">{{ $cliente->email }}</p>
                        <p class="m-0">{{ $cliente->endereco . " - " . $cliente->bairro}}</p>
                        <p class="m-0">{{ $cliente->cidade }} - {{ $cliente->estado->uf }}</p>
                        <p class="m-0">{{ $cliente->telefone }}</p>
                    </div>
                </div>
            </div>
            <br class="hide-on-large-only">
            <div class="col l6 offset-l1 s12 px-4 py-2 rounded z-depth-2 card-info-user">
                <div class="row my-0 mb-2">
                    <h5 class="m-0 pl-2">
                        <span class="teal-text text-darken-2 font-weight-bold">Meus PETS</span>
                        <a href="#modalPets" class="waves-effect waves-light teal-text right mr-2 modal-trigger"><i class="fas fa-plus"></i></a>
                    </h5>
                </div>
                <div class="row my-0 pl-2">
                    @if (!$possuiPet)
                        <div class="valign-wrapper">
                            <h5 class="grey-text text-darken-2 center">Você não possui nenhum PET cadastrado!</h5>
                        </div>
                    @else
                        @foreach ($petsHome as $pet)
                            <div class="row valign-wrappe my-1">
                                <div class="col l2 s1 center pr-0">
                                    <img src="{{ asset('images/cao.jpg') }}" class="circle responsive-img pet-img">
                                </div>
                                <div class="col l10 s11 pl-0">
                                    <table class="p-0 table-borderless">
                                        <tr>
                                            <th class="p-0">
                                                <h6 class="mt-1 font-weight-bold">
                                                    {{ $pet->nome }}
                                                    @if ($pet->sexo == "M")
                                                        <i class="fa fa-mars blue-text" aria-hidden="true"></i>
                                                    @else 
                                                    <i class="fa fa-venus pink-text" aria-hidden="true"></i>
                                                    @endif
                                                </h6>
                                            </th>
                                            <th class="p-0" rowspan="2"><a href="#" class="waves-effect waves-light btn btn-small cyan darken-1 font-weight-normal right">DETALHES</a></th>
                                        </tr>
                                        <tr>
                                            <td class="p-0"><span>{{ $pet->especie->nome }} • {{ $pet->raca_predominante->nome }}</span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <hr class="my-0">
                        @endforeach
                        <a href="#modalListaPets" class="my-0 grey-text text-darken-2 hover-link modal-trigger">Ver todos</a>
                    @endif
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col l12 s12 fix-tabs-content">
                <ul id="tabs-swipe" class="tabs">
                    <li class="tab col l3 s6"><a class="active" href="#agendamento">Agendamento</a></li>
                    <li class="tab col l3 s6"><a href="#conta">Conta</a></li>
                </ul>
                <div id="agendamento" class="col l12 s12 gradient-tab-content">
                    <div class="row">
                        <div class="col l4 s12">
                            <div class="input-field col l12 s12 mt-4">
                                <input id="nascimento" type="text" name="data" id="data" class="datepicker" placeholder="Informe a data para o agendamento" required>
                                <label for="nascimento" class="dark-text">Data</label>
                            </div>
                        </div>
                        <div class="col l8 s12">
                            <table>
                                <thead>
                                    <tr class="grey-text text-darken-2">
                                        <th>Horário</th>
                                        <th>Evento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 8; $i <= 18; $i++)
                                        <tr>
                                            <td>{{ $i }}:00</td>
                                            <td>
                                                <a href="#" class="waves-effect waves-light btn right"><i class="fas fa-plus-circle"></i> Novo Evento</a>
                                            </td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div id="conta" class="col l12 s12 gradient-tab-content">
                    <a href="#" class="teal-text link-hover right">Imprimir Conta<i class="fa fa-print ml-1" aria-hidden="true"></i></a>
                    <table>
                        <thead>
                            <tr class="grey-text text-darken-2">
                                <th>Data</th>
                                <th>Descrição</th>
                                <th>Valor Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 8; $i >= 1; $i--)
                                <tr>
                                    <td>XX/XX/XXXX XX:XX</td>
                                    <td>
                                        <span class="chip teal lighten-2 white-text rounded text-muted">Compra 00{{ $i }}</span>
                                        Descrição
                                        <a href="#" class="mt-2 grey-text text-darken-2 hover-link right">Ver mais</a>
                                    </td>
                                    <td>R$ $$,$$</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-------------- Estrutura Modais -------------->
    @include('sistema.cliente.cadastroCliente')

    @include('sistema.cliente.cadastroAnimal')

    @include('sistema.cliente.listaPets')

    <!-------------- Inicialização Modais -------------->
    <script>
        $(document).ready(function(){
            $('#modalCliente').modal();
            $('#modalPets').modal();
            $('#modalListaPets').modal();
        });
    </script>

    <script>
         $(document).ready(function(){
            $('#tabs-swipe').tabs({
                swipeable: true
            });
        });
    </script>
    <script src="{{ asset('js/configDatepicker.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>

    @endcan
@endsection
