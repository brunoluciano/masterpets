@extends('layouts.sistema')

@section('content')
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
    <br>
    <div class="row pt-4">
        <div class="col l3 m6 s12">
            <a href="{{ route('cadastros') }}">
                <div class="card-panel gradient-card-cadastro z-depth-2 hoverable">
                    <h3 class="header-dashboard-card center">CADASTROS</h3>
                    <h4 class="white-text my-0 right-align">
                        <i class="fas fa-paste fa-3x"></i>
                    </h4>
                </div>
            </a>
        </div>
        <div class="col l3 m6 s12">
            <a href="{{ route('venda.index') }}">
                <div class="card-panel gradient-card-venda z-depth-2 hoverable">
                    <h3 class="header-dashboard-card center">VENDA</h3>
                    <h4 class="white-text my-0 right-align">
                        <i class="fas fa-shopping-cart fa-3x"></i>
                    </h4>
                </div>
            </a>
        </div>
        <div class="col l3 m6 s12">
            <a href="#">
                <div class="card-panel gradient-card-agenda z-depth-2 hoverable">
                    <h3 class="header-dashboard-card center">AGENDA</h3>
                    <h4 class="white-text my-0 right-align">
                        <i class="fas fa-calendar-alt fa-3x"></i>
                    </h4>
                </div>
            </a>
        </div>
        <div class="col l3 m6 s12">
            <a href="{{ route('pesquisa.index') }}">
                <div class="card-panel gradient-card-pesquisa z-depth-2 hoverable">
                    <h3 class="header-dashboard-card center">PESQUISA</h3>
                    <h4 class="white-text my-0 right-align">
                        <i class="fas fa-search fa-3x"></i>
                    </h4>
                </div>
            </a>
        </div>
    </div>
    @can('isGerente')
    <div class="row">
        <div class="col l3 m6 s12">
            <a href="#">
                <div class="card-panel gradient-card-financeiro z-depth-2 hoverable">
                    <h3 class="header-dashboard-card center">FINANCEIRO</h3>
                    <h4 class="white-text my-0 right-align">
                        <i class="fas fa-dollar-sign fa-3x"></i>
                    </h4>
                </div>
            </a>
        </div>
        <div class="col l3 m6 s12">
            <a href="#">
                <div class="card-panel gradient-card-relatorios z-depth-2 hoverable">
                    <h3 class="header-dashboard-card center">RELATÓRIOS</h3>
                    <h4 class="white-text my-0 right-align">
                        <i class="fas fa-clipboard-list fa-3x"></i>
                    </h4>
                </div>
            </a>
        </div>
        <div class="col l3 m6 s12">
            <a href="#">
                <div class="card-panel gradient-card-estoque z-depth-2 hoverable">
                    <h3 class="header-dashboard-card center">ESTOQUE</h3>
                    <h4 class="white-text my-0 right-align">
                        <i class="fas fa-database fa-3x"></i>
                    </h4>
                </div>
            </a>
        </div>
    </div>
    @endcan
    <br>
    <div class="row ml-3">
        <div class="col l5 s12 p-4 rounded z-depth-2 card-info-user">
            <div class="row my-0">
                <h4 class="m-0 pl-2">
                    <span class="teal-text text-darken-2 font-weight-light"><b>{{ $user->name }}</b></span>
                    <a href="#modalUsuario" class="waves-effect waves-light btn right cyan darken-1 mr-2 modal-trigger">DETALHES</a>
                </h4>
            </div>
            <br>
            <div class="row my-0 pl-2">
                <div class="font-italic grey-text text-darken-2">
                    <p class="m-0">{{ $user->email }}</p>
                    <p class="m-0">{{ $user->endereco . " " . $user->numero . " - " . $user->bairro}}</p>
                    <p class="m-0">{{ $user->cidade }} - {{ $user->estado->uf }}</p>
                    <p class="m-0">{{ $user->telefone }}</p>
                </div>
            </div>
            <hr>
            <div class="row my-0 pl-2">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="py-1"scope="row">Vendas realizadas hoje</td>
                            <td class="py-1 font-italic font-weight-bold teal-text right">{{ $vendasHoje }}</td>
                        </tr>
                        <tr>
                            <td class="py-1" scope="row">Vendas realizadas nessa semana</td>
                            <td class="py-1 font-italic font-weight-bold teal-text right">{{ $vendasSemana }}</td>
                        </tr>
                        <tr>
                            <td class="py-1" scope="row">Vendas realizadas nesse mês</td>
                            <td class="py-1 font-italic font-weight-bold teal-text right">{{ $vendasMes }}</td>
                        </tr>
                        <tr>
                            <td class="py-1" scope="row">Todas vendas realizadas</td>
                            <td class="py-1 font-italic font-weight-bold teal-text right">{{ $totalVendas }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('sistema.principal.atualizarUsuario')

    <script>
        $(document).ready(function(){
            $('#modalUsuario').modal();
            $('select').formSelect();
        });
    </script>
     <script src="{{ asset('js/configDatepicker.js')}}"></script>

@endsection
