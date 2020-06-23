@extends('layouts.sistema')

@section('content')
    @can('isCliente')
    <div class="container py-4">
        @if ($message = Session::get('success'))
            <script>
                toastr.options = {
                    "positionClass": "toast-top-full-width",
                    "showDuration": "300",
                    "hideDuration": "1000"
                }
                Command: toastr["success"]("{{ $message }}")
            </script>
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
                        <p class="m-0">{{ $cliente->endereco . " " . $cliente->numero . " - " . $cliente->bairro}}</p>
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
                            <div class="row valign-wrapper my-1">
                                <div class="col l2 s2 center pr-0 pt-1">
                                    <img src="{{ asset('storage/'.$pet->path_img) }}" class="circle responsive-img pet-img z-depth-2 border border-{{ $pet->sexo == "M" ? 'blue' : 'pink' }}">
                                </div>
                                <div class="col l10 s10 pl-0">
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
                                            <th class="p-0" rowspan="2"><a href="#modalPetUpdate{{ $pet->id }}" class="waves-effect waves-light btn btn-small cyan darken-1 font-weight-normal right modal-trigger">DETALHES</a></th>
                                        </tr>
                                        @php
                                            $idade = \Carbon\Carbon::parse($pet->nascimento)->diff(\Carbon\Carbon::now())->format('%y anos, %m meses e %d dias');

                                            $raca_secundaria = isset($pet->raca_secundaria->nome) ? $pet->raca_secundaria->nome : '';
                                            $raca_secundaria_id = isset($pet->raca_secundaria_id) ? $pet->raca_secundaria_id : '';
                                            $raca_secundaria_show = isset($pet->raca_secundaria->nome) ? " | " . $pet->raca_secundaria->nome : '';

                                            $cor_secundaria = isset($pet->cor_secundaria->descricao) ? $pet->cor_secundaria->descricao : '';
                                            $cor_secundaria_id = isset($pet->cor_secundaria_id) ? $pet->cor_secundaria_id : '';
                                            $cor_secundaria_show = isset($pet->cor_secundaria->descricao) ? " | " . $pet->cor_secundaria->descricao : '';
                                        @endphp
                                        <tr>
                                            <td class="p-0"><span>{{ $pet->especie->nome }} • {{ $pet->raca_predominante->nome }} {{ $raca_secundaria_show }}</span></td>
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

                @include('sistema.cliente.agendamento')
                @include('sistema.cliente.conta')

            </div>
        </div>
    </div>

    <!-------------- Estrutura Modais -------------->
    @include('sistema.cliente.cadastroCliente')

    @include('sistema.cliente.cadastroAnimal')

    @include('sistema.cliente.listaPets')

    @include('sistema.cliente.petUpdate')

    @include('sistema.cliente.petRemove')

    @include('sistema.cliente.listaItensVenda')

    @include('sistema.cliente.modalAgendamento')

    @include('sistema.cliente.modalAgendamentoEditar')

    @include('sistema.cliente.modalAgendamentoCancelar')

    <!-------------- Inicialização Modais -------------->
    <script>
        $(document).ready(function(){
            $('#modalCliente').modal();
            $('#modalPets').modal();
            $('#modalListaPets').modal();
            $('#modalAgendamento').modal();
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
