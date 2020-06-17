<div id="conta" class="col l12 s12 gradient-tab-content">
    <a href="#" class="teal-text link-hover right">Imprimir Conta<i class="fa fa-print ml-1" aria-hidden="true"></i></a>
    <table>
        <thead>
            <tr class="grey-text text-darken-2">
                <th>Horário da Compra</th>
                <th colspan="2">Descrição</th>
                <th>Valor Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($compras as $compra)
                <tr>
                    <td rowspan="2">{{ \Carbon\Carbon::parse($compra->horario_venda)->format('d/m/Y H:i:s') }}</td>
                    <td class="py-0 pt-2"><span class="chip teal lighten-2 white-text rounded text-muted z-depth-1">Compra {{ sprintf('%03d',$compra->id) }}</span></td>
                    <td rowspan="2"><a href="#verMaisCompra{{ $compra->id }}" class="mt-2 teal-text text-darken-2 hover-link ml-2 right modal-trigger"><i>Ver mais</i></a></td>
                    <td rowspan="2" class="font-weight-bold cyan-text text-darken-3">R$ {{ number_format($compra->total_venda,2,',','.') }}</td>
                </tr>
                <tr>
                    <td class="valign-wrapper py-1">
                        @foreach (\App\ItemVenda::where('venda_id','=',$compra->id)->take(3)->get() as $item)
                            <img class="chip-img ml-2" src="{{ env('APP_URL') }}/storage/{{ $item->produto->path_img }}">
                            <span>{{ $item->produto->descricao }}</span>
                        @endforeach
                    </td>
                </tr>
                <script>
                    $(document).ready(function(){
                        $('#verMaisCompra{{ $compra->id }}').modal();
                    });
                </script>
            @endforeach
        </tbody>
    </table>
</div>
