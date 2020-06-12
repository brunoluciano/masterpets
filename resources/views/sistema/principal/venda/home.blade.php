@extends('layouts.sistema')

@section('content')
<div class="row mx-3">
    <h2>Venda (PDV)</h2>
    <div class="bg-pdv-gradient z-depth-3 rounded white-text p-2">
        <div class="row">
            <div class="col l7 s12">
                <h5 class="font-weight-light">Localize um produto/serviço abaixo:</h5>
                <div class="row mb-0">
                    <div class="input-field col s12">
                        <input type="text" id="produto" class="autocomplete">
                        <label for="autocomplete-input">Digite o código ou o nome</label>
                    </div>
                </div>
                <div class="row m-0 p-3 bg-pdv-produto border rounded z-depth-2 hoverable">
                    <div class="col l4 s12 mt-2">
                        {{-- <img id="produto_img" src="{{ env('APP_URL') }}/storage/produto/Vital Pro Adulto/jRI75Uo29ZOadXFePmq5qNzIN4VaxY184iO6X2Fl.png" class="responsive-img z-depth-2"> --}}
                        <img id="produto_img" src="{{ asset('images/produtoSemFigura.jpg') }}" class="responsive-img z-depth-2">
                    </div>
                    <div class="col l8 s12 mt-2">
                        <div class="row">
                            <div class="input-field col l3 s2">
                                <input id="codigo" type="text" name="id" value="" disabled>
                                <label for="id" id="codigoLabel">Código</label>
                            </div>
                            <div class="input-field col l9 s10">
                                <input id="descricao" type="text" name="descricao" disabled>
                                <label id="descricaoLabel" class="active" for="descricao">Descrição</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col l6 s6">
                                <input id="quantidade" type="number" min="1" name="quantidade" class="validate @error('nome') invalid @enderror" >
                                <label for="quantidade">Quantidade</label>
                                @error('quantidade')
                                    <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-field col l6 s6">
                                <input id="preco_venda" type="text" name="preco_venda" value="R$ XX,XX" disabled>
                                <label id="preco_vendaLabel" for="preco_venda">Valor Unitário</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col l12 s12">
                                <input id="total_venda" type="text" name="total_venda" class="money" value="R$ XX,XX" disabled>
                                <label class="active" for="total_venda">Valor Total</label>
                            </div>
                        </div>
                        <div class="row">
                            <button class="btn waves-effect waves-light btn-block" type="submit" name="action">Adicionar Produto
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l5 s12">
                <div class="row m-0 grey darken-4 border rounded z-depth-2">
                    <div class="col l12 s12">
                        <table class="hoverable">
                            <tr>
                                <td class="right-align py-0">Cliente</td>
                                <td class="py-0">
                                    <div class="input-field my-0">
                                        <input id="email_inline" type="email" class="validate" placeholder="Informe o cliente da venda">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="right-align py-0">Vendedor</td>
                                <td class="py-0">
                                    <div class="input-field select-light-text white-arrow my-0">
                                        <select>
                                            <option value="" disabled selected>Escolher vendedor...</option>
                                            <option value="1">Option 1</option>
                                            <option value="2">Option 2</option>
                                            <option value="3">Option 3</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row m-0">
                    <h5 class="font-weight-light">Itens no carrinho <i class="fa fa-shopping-cart" aria-hidden="true"></i></h5>

                    {{-- <p class="py-2 px-3 rounded blue-grey lighten-1 center-align z-depth-2">Seu carrinho está vazio <i class="fas fa-exclamation-triangle yellow-text"></i></p> --}}

                    <table class="striped centered border rounded hoverable table-overflow">
                        <thead class="teal lighten-1">
                            <tr>
                                <th data-field="id">Itens</th>
                                <th data-field="name">Produto</th>
                                <th data-field="price">Valor</th>
                                <th data-field="price">Operações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 5; $i++)
                                <tr>
                                    <td>Alvin</td>
                                    <td>Eclair</td>
                                    <td>.87</td>
                                    <td>
                                        <a href="#" class="waves-effect waves-light btn amber"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="waves-effect waves-light btn red lighten-1"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                    <hr class="mt-4">
                    <h5 class="font-weight-light">Total do Pedido:</h5>
                    <div class="row m-0">
                        <div class="col s12 px-0 center-align">
                            <h5 class="grey lighten-3 teal-text py-2 px-3 mt-1 rounded-pill font-weight-bold hoverable">R$ XX,XX</h5>
                        </div>
                    </div>
                    <div class="row m-0">
                        <div class="col l6 s12 px-0">
                            <a href="#" class="waves-effect waves-light btn btn-block green lighten-1">Confirmar Venda <i class="fa fa-check"></i></a>
                        </div>
                        <div class="col l6 s12 px-0">
                            <a href="#" class="waves-effect waves-light btn btn-block grey lighten-2 grey-text text-darken-3">Cancelar <i class="fas fa-times"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('select').formSelect();
    });
</script>

<script>
    $(document).ready(function(){
        $.ajax({
            type: 'get',
            url: '{!! URL::to('dashboard/venda/findProdutos') !!}',
            success:function(response){
                console.log(response);
                // converter array para object
                var proArray = response;
                var dataPro = {};
                var dataPro2 = {};
                for (var i = 0; i < proArray.length; i++) {
                    dataPro[proArray[i].descricao] = '{{ env("APP_URL") }}/storage/'+proArray[i].path_img;
                    dataPro2[proArray[i].descricao] = proArray[i];
                }
                console.log(dataPro2);

                // materialize css
                $('input#produto').autocomplete({
                    data: dataPro,
                    onAutocomplete:function(reqdata){
                        console.log(dataPro2[reqdata])
                        $('input#codigo').val(dataPro2[reqdata]['id']);
                        $('input#descricao').val(dataPro2[reqdata]['descricao']);
                        $('input#preco_venda').val(dataPro2[reqdata]['preco_venda']);
                        $('input#quantidade').attr('max', dataPro2[reqdata]['estoque_atual']);
                        $('input#quantidade').attr('max', dataPro2[reqdata]['estoque_atual']);
                        $('img#produto_img').attr('src', '{{ env("APP_URL") }}/storage/'+dataPro2[reqdata]['path_img'])

                        $('label#codigoLabel').addClass('active');
                        $('label#descricaoLabel').addClass('active');
                        $('label#preco_vendaLabel').addClass('active');
                    }
                });
            }
        })

        $('input#quantidade').click(function(){
            var total = $('input#quantidade').val() * $('input#preco_venda').val()
            $('input#total_venda').addClass('money');
            $('input#total_venda').val(total);

        });
    })
</script>

@endsection
