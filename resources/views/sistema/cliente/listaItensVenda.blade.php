@foreach ($compras as $compra){
<div id="verMaisCompra{{ $compra->id }}" class="modal">
    <div class="modal-content grey darken-4 p-0 gradient-modal-content">
        <h4 class="cyan darken-2 white-text p-4">
            Compra • {{ \Carbon\Carbon::parse($compra->horario_venda)->format('d/m/Y H:i:s') }}
            <a href="#" class="right modal-action modal-close white-text"><i class="fa fa-times fa-xs" aria-hidden="true"></i></a>
        </h4>
        <div class="row m-0">
            <div class="col l12 s12 white-text">
                <table id="tableCarrinho" class="striped centered border rounded hoverable table-overflow-cliente">
                    <thead class="teal lighten-1">
                        <tr>
                            <th data-field="id">Itens</th>
                            <th data-field="name">Produto</th>
                            <th data-field="price">Valor Unitário</th>
                            <th data-field="price">Sub-total</th>
                        </tr>
                    </thead>
                    <tbody id="lista_carrinho" class="text-shadow">
                        @foreach (\App\ItemVenda::where('venda_id','=',$compra->id)->get() as $item)
                            <tr>
                                <td>{{ $item->quantidade }}</td>
                                <td class="valign-wrapper">
                                    <img src="{{ env('APP_URL') }}/storage/{{ $item->produto->path_img }}" class="chip-img right-align materialboxed" data-caption="{{ $item->produto->descricao }}">
                                    <span class="ml-2">{{ $item->produto->descricao }}</span>
                                </td>
                                <td>R$ {{ number_format($item->produto->preco_venda,2,',','.') }}</td>
                                <td>R$ {{ number_format($item->total,2,',','.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <h5 class="grey lighten-3 grey-text text-darken-3 py-2 px-3 mt-1 rounded-pill font-weight-bold hoverable center-align">
                    Total da Compra: <span class="teal-text">R$ {{ number_format($item->venda->total_venda,2,',','.') }}</span>
                </h5>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
    $(document).ready(function(){
        $('.materialboxed').materialbox();
    });
</script>
