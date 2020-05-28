@extends('layouts.sistema')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-title">Dashboard</div>

                <div class="card-content">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Você está logado no sistema!

                    @can('isCliente')
                        <h3>Cliente</h3>
                    @elsecan('isFuncionario')
                        <h3>Funcionário</h3>
                    @elsecan('isGerente')
                        <h3>Gerente</h3>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
