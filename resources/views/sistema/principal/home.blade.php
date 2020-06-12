@extends('layouts.sistema')

@section('content')
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
            <a href="#">
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
@endsection
