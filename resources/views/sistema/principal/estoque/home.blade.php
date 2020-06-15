@extends('layouts.sistema')

@section('content')
<div class="container-fluid p-4">
    <h2 class="my-0 ml-3 grey-text text-darken-2">Estoque <i class="fas fa-database"></i></h2>
    <div class="row mt-3 p-3 gradient-modal-content">
        <div class="row my-0 valign-wrapper">
            <a href="#modalEntrada" class="waves-effect waves-light btn btn-block green modal-trigger"><i class="fas fa-plus"></i> Nova Entrada de Produto</a>
            <div class="col l12 s12">
                <div class="input-field">
                    <input type="text" id="input_produto" onkeyup="buscaProduto()" name="autocomplete-produto" >
                    <i class="fas fa-search fa-xs prefix right white-text"></i>
                    <label for="autocomplete-input">Buscar por produto</label>
                </div>
            </div>
        </div>
        <hr class="my-0 divider">
        <table id="table_produto" class="striped centered blue-grey darken-2 white-text hoverable text-shadow table-overflow-pesquisa">
            <thead class="cyan darken-3">
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Unidade</th>
                    <th>Cód. Barras</th>
                    <th>Estoque Mínimo</th>
                    <th>Estoque Máximo</th>
                    <th>Estoque Atual</th>
                    <th>Preço Compra</th>
                    <th>Preço Venda</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    @php
                        $preco_compra = number_format($produto->preco_compra,2,',','.');
                        $preco_venda = number_format($produto->preco_venda,2,',','.');
                        if ($produto->estoque_atual >= ($produto->estoque_maximo / 2)) {
                            $estoque_cor = "green-text text-accent-3";
                        } else if (($produto->estoque_atual < ($produto->estoque_maximo / 2)) && ($produto->estoque_atual > $produto->estoque_minimo)) {
                            $estoque_cor = "yellow-text text-accent-3";
                        } else {
                            $estoque_cor = "red-text text-accent-3";
                        }
                    @endphp

                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>
                            <img src="{{ env('APP_URL') }}/storage/{{ $produto->path_img }}" class="chip-img border ml-2">
                            <span>{{ $produto->descricao }}</span>
                        </td>
                        <td>{{ $produto->tipo->descricao }}</td>
                        <td>{{ $produto->marca->descricao }}</td>
                        <td>{{ $produto->unidade }} ({{ $produto->unidade_medida->abreviacao }})</td>
                        <td>{{ $produto->cod_barras }}</td>
                        <td>{{ $produto->estoque_minimo }}</td>
                        <td>{{ $produto->estoque_maximo }}</td>
                        <td class="{{ $estoque_cor }} font-weight-bold">{{ $produto->estoque_atual }}</td>
                        <td>R$ {{ $preco_compra }}</td>
                        <td>R$ {{ $preco_venda }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div id="alertaSemProduto" class="row yellow lighten-2 rounded z-depth-2" style="display: none;">
            <h5 class="center py-2">Nenhum produto encontrado <i class="fas fa-exclamation-triangle"></i></h5>
        </div>
    </div>
</div>

@include('sistema.principal.estoque.modalEntrada')

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
@foreach ($faltaProdutos as $produto)
    <script>
        $(document).ready(function(){
            toastr.options = {
            "positionClass": "toast-top-full-width",
            "showDuration": "2000",
            "hideDuration": "2000",
            "timeOut": "10000",
            "extendedTimeOut": "10000",
            }
            Command: toastr["error"]("O produto {{ $produto->descricao }} está abaixo do estoque mínimo ({{ $produto->estoque_minimo }}), com apenas {{ $produto->estoque_atual }} unidades")
        });
    </script>
@endforeach

<script>
    function buscaProduto() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue, cont;
        input = document.getElementById("input_produto");
        filter = input.value.toUpperCase();
        table = document.getElementById("table_produto");
        tr = table.getElementsByTagName("tr");
        alerta = document.getElementById("alertaSemProduto");
        cont = 0;

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    //
                } else {
                    cont = cont + 1;
                    tr[i].style.display = "none";
                }
            }
        }
        if (cont == tr.length - 1){
            alerta.style.display = "";
            table.style.display = "none";
        } else {
            alerta.style.display = "none";
            table.style.display = "";
        }
    }
</script>

@stop
