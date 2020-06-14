<div class="row my-0">
    <div class="col l3 s12">
        <div class="input-field">
            <input type="text" id="autocomplete-input" class="autocomplete">
            <i class="fas fa-search fa-xs prefix right white-text"></i>
            <label for="autocomplete-input">Buscar por serviço</label>
        </div>
    </div>
</div>
<hr class="my-0 divider">
<table class="striped centered white-text hoverable text-shadow table-overflow-pesquisa">
    <thead>
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Tipo do serviço</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($servicos as $servico)
            @php
                $valor = number_format($servico->valor,2,',','.');
            @endphp

            <tr>
                <td>{{ $servico->id }}</td>
                <td>{{ $servico->descricao }}</td>
                <td>{{ $servico->tipo_servico->descricao }}</td>
                <td>R$ {{ $valor }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<br><br>
