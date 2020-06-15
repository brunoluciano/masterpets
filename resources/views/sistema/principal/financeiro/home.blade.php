@extends('layouts.sistema')

@section('content')
<div class="container-fluid p-4">
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
        <h2 class="my-0 ml-3 grey-text text-darken-2">Financeiro <i class="fas fa-dollar-sign"></i></h2>
        <div class="col l4 s12 p-4 rounded z-depth-2 card-info-user">
            <h3 class="m-0 mb-3 pl-2 blue-grey-text text-lighten-1"><b>DIA</b> <span class="ml-2">{{ $hoje }}</span></h3>
            <div class="row">
                <div class="col l6 green-text border-right border-blue-grey">
                    <h4 class="font-weight-light"><b>R$ {{ $lucroHoje }}</b></h4>
                    <h6 class="font-weight-bold">lucro</h6>
                </div>
                <div class="col l6 center orange-text text-darken-1">
                    <h4 class="font-weight-light"><b>{{ $qtdVendasHoje }}</b></h4>
                    <h6 class="font-weight-bold">vendas</h6>
                </div>
            </div>
        </div>
        <div class="col l4 s12 p-4 rounded z-depth-2 card-info-user">
            <h3 class="m-0 mb-3 pl-2 blue-grey-text text-lighten-1"><b>SEMANA</b></h3>
            <div class="row">
                <div class="col l6 green-text border-right border-blue-grey">
                    <h4 class="font-weight-light"><b>R$ {{ $lucroSemana }}</b></h4>
                    <h6 class="font-weight-bold">lucro</h6>
                </div>
                <div class="col l6 center orange-text text-darken-1">
                    <h4 class="font-weight-light"><b>{{ $qtdVendasSemana }}</b></h4>
                    <h6 class="font-weight-bold">vendas</h6>
                </div>
            </div>
        </div>
        <div class="col l4 s12 p-4 rounded z-depth-2 card-info-user">
            <h3 class="m-0 mb-3 pl-2 blue-grey-text text-lighten-1"><b>MÊS</b> <span class="ml-2">{{ $mes }}</span></h3>
            <div class="row">
                <div class="col l6 green-text border-right border-blue-grey">
                    <h4 class="font-weight-light"><b>R$ {{ $lucroMes }}</b></h4>
                    <h6 class="font-weight-bold">lucro</h6>
                </div>
                <div class="col l6 center orange-text text-darken-1">
                    <h4 class="font-weight-light"><b>{{ $qtdVendasMes }}</b></h4>
                    <h6 class="font-weight-bold">vendas</h6>
                </div>
            </div>
        </div>
    </div>
    <h4 class="grey-text text-darken-2">Vendas Realizadas</h4>
    <div class="row">
        <table class="striped centered blue-grey darken-2 white-text hoverable text-shadow table-overflow-pesquisa">
            <thead class="cyan darken-3">
                <tr>
                    <th>Código da Venda</th>
                    <th>Cliente</th>
                    <th>Vendedor</th>
                    <th>Horário</th>
                    <th>Valor Total</th>
                    <th>Detalhes da Compra</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendas as $venda)
                    @php
                        $total_venda = number_format($venda->total_venda,2,',','.');
                    @endphp

                    <tr>
                        <td>{{ $venda->id }}</td>
                        <td>{{ $venda->cliente->name }}</td>
                        <td>{{ $venda->vendedor->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($venda->horario_venda)->format('d/m/Y H:i:s') }}</td>
                        <td>R$ {{ $total_venda }}</td>
                        <td><a href="#modalVenda{{ $venda->id }}" class="waves-effect waves-light btn light-blue lighten-2 modal-trigger">Detalhes</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-------------- Estrutura Modais -------------->
@include('sistema.principal.financeiro.modalVenda')

@stop
