@extends('layouts.sistema')

@section('content')
<div class="row mx-3">
    <h2 class="ml-3 grey-text text-darken-2">Venda (PDV) <i class="fas fa-shopping-cart"></i></h2>
    <div class="bg-pdv-gradient z-depth-3 rounded white-text p-2">
        <div class="row">
            <div class="col l7 s12">
                <h5 class="font-weight-light">Localize um produto/serviço abaixo:</h5>
                <div class="row mb-0">
                    <div class="input-field col s12">
                        <input type="text" id="produto" class="autocomplete" autocomplete="off">
                        <label for="autocomplete-input">Digite o código ou o nome</label>
                    </div>
                </div>
                <div class="row m-0 p-3 bg-pdv-produto border rounded z-depth-2 hoverable">
                    <form id="adicionar_produto_form" action="{{ route('adicionar.produto.store') }}" method="POST">
                        @csrf

                        <div class="col l4 s12 mt-2">
                            <img id="produto_img" src="{{ asset('images/produtoSemFigura.jpg') }}" class="responsive-img z-depth-2 materialboxed">
                        </div>
                        <div class="col l8 s12 mt-2">
                            <div class="row">
                                <div class="input-field col l3 s2">
                                    <input id="codigo" type="text" name="produto_id" value="" disabled>
                                    <label for="id" id="codigoLabel">Código</label>
                                </div>
                                <div class="input-field col l9 s10">
                                    <input id="descricao" type="text" name="descricao" disabled>
                                    <label id="descricaoLabel" class="active" for="descricao">Descrição</label>
                                </div>
                            </div>
                            <div class="row">
                                <div id="input-quantidade" class="input-field col l6 s6">
                                    <input id="quantidade" type="number" min="1" name="quantidade" value="1" class="validate @error('nome') invalid @enderror" >
                                    <label for="quantidade">Quantidade</label>
                                    @error('quantidade')
                                        <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                                    @enderror
                                    <span id="qtd-semEstoque" class="helper-text data-error" style="visibility: hidden; position: absolute">Produto indisponível em estoque!</span>
                                </div>
                                <div class="input-field col l6 s6">
                                    <input id="preco_venda" type="text" name="preco_venda" value="R$ 0,00" disabled>
                                    <label id="preco_vendaLabel" for="preco_venda">Valor Unitário</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col l12 s12">
                                    <input id="total_venda" type="text" name="total_venda" value="R$ 0,00" disabled>
                                    <label for="total_venda">Valor Total</label>
                                </div>
                            </div>
                            <div class="row">
                                <button id="adicionar_produto_submit" class="btn waves-effect waves-light btn-block" type="submit" name="action">Adicionar Produto
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <form action="{{ route('venda.store') }}" method="POST">
                @csrf

                <div class="col l5 s12">
                    <div class="row m-0 grey darken-4 border rounded z-depth-2">
                        <div class="col l12 s12">
                            <table class="hoverable">
                                <tr>
                                    <td class="right-align py-0">Cliente</td>
                                    <td class="py-0">
                                        <div class="input-field my-0">
                                            <input id="cliente" type="text" name="cliente" class="autocomplete" autocomplete="off" placeholder="Informe o cliente da venda" required>
                                            <input type="hidden" id="cliente_id" name="cliente_id" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="right-align py-0">Vendedor</td>
                                    <td class="py-0">
                                        <input disabled id="vendedor" type="text" name="vendedor" value="{{ $user->name }}">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row m-0">
                        <h5 class="font-weight-light">Itens no carrinho <i class="fa fa-shopping-cart" aria-hidden="true"></i></h5>

                        {{-- @if ($itens_carrinho->count() == 0) --}}
                            <p id="carrinhoVazio" class="py-2 px-3 rounded blue-grey lighten-1 center-align z-depth-2" @if ($itens_carrinho->count() > 0 ) style="visibility: hidden; position: absolute" @else style="visibility: visible; position: relative" @endif>Seu carrinho está vazio <i class="fas fa-exclamation-triangle yellow-text"></i></p>
                        {{-- @else --}}
                            <table id="tableCarrinho" class="striped centered border rounded hoverable table-overflow" @if ($itens_carrinho->count() == 0 ) style="visibility: hidden; position: absolute" @else style="visibility: visible; position: relative" @endif>
                                <thead class="teal lighten-1">
                                    <tr>
                                        <th class="td-qtd-carrinho-venda" data-field="id">Itens</th>
                                        <th colspan="2" class="td-descricao-carrinho-venda" data-field="name">Produto</th>
                                        <th class="td-preco-carrinho-venda" data-field="price">Valor</th>
                                        <th class="td-operacoes-carrinho-venda" data-field="price">Operações</th>
                                    </tr>
                                </thead>
                                <tbody id="lista_carrinho" class="text-shadow">
                                    @foreach ($itens_carrinho as $item)
                                        <tr>
                                            <td class="td-qtd-carrinho-venda">{{ $item->quantidade }}</td>
                                            <td class="td-img-carrinho-venda">
                                                <img src="{{ env('APP_URL') }}/storage/{{ $item->produto->path_img }}" class="chip-img right-align">
                                            </td>
                                            <td class="td-descricao-carrinho-venda">{{ $item->produto->descricao }}</td>
                                            <td class="td-preco-carrinho-venda">R$ {{ number_format($item->produto->preco_venda,2,',','.') }}</td>

                                            <form action="{{ route('remover.produto.destroy', $item->id) }}" method="POST">
                                                <td class="td-operacoes-carrinho-venda">
                                                    <a href="#" class="waves-effect waves-light btn amber"><i class="fas fa-edit"></i></a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="remProduto btn waves-effect waves-light red lighten-1" type="submit" data-id="{{ $item->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        {{-- @endif --}}
                        <hr class="mt-4">
                        <h5 class="font-weight-light">Total do Pedido:</h5>
                        <div class="row m-0">
                            <div class="col s12 px-0 center-align">
                                <h5 id="total_venda" class="grey lighten-3 teal-text py-2 px-3 mt-1 rounded-pill font-weight-bold hoverable">R$ {{ $total_venda }}</h5>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col l6 s12 px-0">
                                <button class="btn waves-effect waves-ligh btn-block green lighten-1" type="submit" name="action">Confirmar Venda <i class="fa fa-check"></i></button>
                            </div>
                            <div class="col l6 s12 px-0">
                                <a href="#cancelarVenda" class="waves-effect waves-light btn btn-block grey lighten-2 grey-text text-darken-3 modal-trigger">Cancelar <i class="fas fa-times"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

 <!-------------- Estrutura Modais -------------->
 @include('sistema.principal.venda.cancelarVenda')

<script>
    $(document).ready(function(){
        $('select').formSelect();
        $('.materialboxed').materialbox({
            inDuration: 400
        });
    });

</script>

<script>
    $(document).ready(function(){
        // AUTO COMPLETE PRODUTOS
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

                        var preco_venda = dataPro2[reqdata]['preco_venda'];
                        preco_venda = preco_venda.toFixed(2).toString().replace(".", ",");
                        var total = $('input#quantidade').val() * dataPro2[reqdata]['preco_venda'];
                        total = total.toFixed(2).toString().replace(".", ",");

                        $('input#codigo').val(dataPro2[reqdata]['id']);
                        $('input#descricao').val(dataPro2[reqdata]['descricao']);
                        $('input#preco_venda').val("R$ " + preco_venda);

                        if (dataPro2[reqdata]['estoque_atual']==0) {
                            $("#qtd-semEstoque").attr('style', 'visibility: visible; position: relative');
                            $('input#quantidade').val(0);
                            $('input#quantidade').prop( "disabled", true );
                        } else {
                            $("#qtd-semEstoque").attr('style', 'visibility: hidden; position: absolute');
                            $('input#quantidade').attr('max', dataPro2[reqdata]['estoque_atual']);
                            $('input#quantidade').val(1);
                            $('input#quantidade').prop( "disabled", false );
                        }

                        $('input#total_venda').val("R$ " + total);
                        $('img#produto_img').attr('src', '{{ env("APP_URL") }}/storage/'+dataPro2[reqdata]['path_img']);
                        $('img#produto_img').attr('data-caption', dataPro2[reqdata]['descricao']);

                        $('label#codigoLabel').addClass('active');
                        $('label#descricaoLabel').addClass('active');
                        $('label#preco_vendaLabel').addClass('active');

                        $('input#quantidade').click(function(){
                            var total = $('input#quantidade').val() * dataPro2[reqdata]['preco_venda'];
                            total = total.toFixed(2).toString().replace(".", ",");
                            $('input#total_venda').val("R$ " + total);
                            $('input#total_venda').addClass('money');
                        });
                    }
                });


            }
        })

        // ADICIONAR PRODUTO CARRINHO //
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#adicionar_produto_submit").click(function(event) {
            event.preventDefault();

            var teste = $('#adicionar_produto_form').serialize();

            $('#adicionar_produto_form').find(':input:disabled').removeAttr('disabled');

            console.log(teste);

            $.ajax({
                type: "post",
                url: '{!! URL::to('dashboard/venda/carrinho/adicionarProduto') !!}',
                dataType: "json",
                data: $('#adicionar_produto_form').serialize(),
                success: function(response){
                    $('#carrinhoVazio').attr('style', 'visibility: hidden; position: absolute');
                    $('#tableCarrinho').attr('style', 'visibility: visible; position: relative');

                    toastr.options = {
                        "positionClass": "toast-top-full-width",
                        "showDuration": "300",
                        "hideDuration": "1000"
                    }
                    Command: toastr["success"](response.message)

                    var preco_venda = response.produtos.produto.preco_venda.toFixed(2).toString().replace(".", ",");

                    $("#lista_carrinho").prepend("<tr><td class='td-qtd-carrinho-venda'>"+response.produtos.quantidade+"</td>"+
                                                    "<td class='td-img-carrinho-venda'><img src='{{ env('APP_URL') }}/storage/"+response.produtos.produto.path_img+"' class='chip-img right-align'></td>"+
                                                    "<td class='td-descricao-carrinho-venda'>"+response.produtos.produto.descricao+"</td>"+
                                                    "<td class='td-preco-carrinho-venda'>R$ "+preco_venda+"</td>"+
                                                    "<td class='td-operacoes-carrinho-venda'>"+
                                                        "<a href='#' class='waves-effect waves-light btn amber'><i class='fas fa-edit'></i></a>"+
                                                        "<input type='hidden' name='_token' value='{{ csrf_token() }}'>"+
                                                        "<input type='hidden' name='_method' value='DELETE'>"+
                                                        "<button id='remProdutoAjax' class='btn waves-effect waves-light red lighten-1' type='submit' data-id='"+response.produtos.id+"'><i class='fa fa-trash'></i></button>"+
                                                    "</td></tr>")

                    $("h5#total_venda").text("R$ "+response.total_venda);
                    if (response.atualizar_qtd_produto==0) {
                        $("#qtd-semEstoque").attr('style', 'visibility: visible; position: relative');
                        $('input#quantidade').val(0);
                        $('input#quantidade').prop( "disabled", true );
                    } else {
                        $("#qtd-semEstoque").attr('style', 'visibility: hidden; position: absolute');
                        $('input#quantidade').attr('max', response.atualizar_qtd_produto);
                        $('input#quantidade').val(1);
                        $('input#quantidade').prop( "disabled", false );
                    }

                    console.log("ID INSERIDO");
                    console.log(response.produtos.id);
                },
                error: function(response){
                    toastr.options = {
                        "positionClass": "toast-top-full-width",
                        "showDuration": "300",
                        "hideDuration": "1000"
                    }
                    Command: toastr["error"]("Erro ao adicionar o produto no carrinho!")
                }
            });
        });

        // REMOVER PRODUTO CARRINHO //
        $(".remProduto").click(function (e) {
            e.preventDefault();

            var obj = $(this); // first store $(this) in obj
            var id = $(this).attr('data-id'); // get id of data using this
            var token = $("meta[name='csrf-token']").attr("content");
            console.log("ID: PRODUTO EXCLUIDO");
            console.log(id);
            $.ajax({
                type: "DELETE",
                url: "{!! URL::to('dashboard/venda/carrinho/removerProduto/') !!}" + '/' + id,
                dataType: "json",
                data: {
                    _token: token,
                    "id": id,
                },
                success: function(response) {
                    $("h5#total_venda").text("R$ "+response.total_venda);
                    if (response.success) {
                        $(obj).closest("tr").remove(); // You can remove row like this
                        toastr.options = {
                            "positionClass": "toast-top-full-width",
                            "showDuration": "300",
                            "hideDuration": "1000"
                        }
                        Command: toastr["success"](response.message)
                    }
                },
                error: function() {
                    toastr.options = {
                        "positionClass": "toast-top-full-width",
                        "showDuration": "300",
                        "hideDuration": "1000"
                    }
                    Command: toastr["error"]("Erro ao remover o produto do carrinho!")
                }
            });
        });

        // AUTO COMPLETE CLIENTES //
        $.ajax({
            type: 'get',
            url: '{!! URL::to('dashboard/venda/findClientes') !!}',
            success:function(response){
                console.log(response);
                // converter array para object
                var cliArray = response;
                var dataCli = {};
                var dataCli2 = {};
                for (var i = 0; i < cliArray.length; i++) {
                    dataCli[cliArray[i].name] = null;
                    dataCli2[cliArray[i].name] = cliArray[i];
                }
                console.log(dataCli2);

                // materialize css
                $('input#cliente').autocomplete({
                    data: dataCli,
                    onAutocomplete:function(reqdata){
                        console.log(dataCli2[reqdata])
                        $('input#cliente_id').val(dataCli2[reqdata]['id']);
                    }
                });
            }
        })
    })
</script>
@endsection
