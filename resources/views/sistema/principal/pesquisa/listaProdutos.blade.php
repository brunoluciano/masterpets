<div class="row my-0">
    <div class="col l3 s12">
        <div class="input-field">
            <input type="text" id="autocomplete-input" class="autocomplete">
            <i class="fas fa-search fa-xs prefix right white-text"></i>
            <label for="autocomplete-input">Buscar por produto</label>
        </div>
    </div>
</div>
<hr class="my-0 divider">
<table class="striped centered white-text hoverable text-shadow table-overflow-pesquisa">
    <thead>
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
            @endphp

            <tr>
                <td>{{ $produto->id }}</td>
                <td>
                    <img src="{{ env('APP_URL') }}/storage/{{ $produto->path_img }}" class="chip-img ml-2">
                    <span>{{ $produto->descricao }}</span>
                </td>
                <td>{{ $produto->tipo->descricao }}</td>
                <td>{{ $produto->marca->descricao }}</td>
                <td>{{ $produto->unidade }} ({{ $produto->unidade_medida->abreviacao }})</td>
                <td>{{ $produto->cod_barras }}</td>
                <td>{{ $produto->estoque_minimo }}</td>
                <td>{{ $produto->estoque_maximo }}</td>
                <td>{{ $produto->estoque_atual }}</td>
                <td>R$ {{ $preco_compra }}</td>
                <td>R$ {{ $preco_venda }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<br><br>
