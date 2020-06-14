<div class="row my-0">
    <div class="col l3 s12">
        <div class="input-field">
            <input type="text" id="autocomplete-input" class="autocomplete">
            <i class="fas fa-search fa-xs prefix right white-text"></i>
            <label for="autocomplete-input">Buscar por animal</label>
        </div>
    </div>
</div>
<hr class="my-0 divider">
<table class="striped centered white-text hoverable text-shadow table-overflow-pesquisa">
    <thead>
        <tr>
            <th style="width:30px">ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Espécie</th>
            <th>Raça</th>
            <th>Cor</th>
            <th>Porte</th>
            <th>Características</th>
            <th>Dono</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pets as $pet)
            @php
                $idade = \Carbon\Carbon::parse($pet->nascimento)->diff(\Carbon\Carbon::now())->format('%y anos, %m meses e %d dias');
                $raca_secundaria = isset($pet->raca_secundaria->nome) ? " | " . $pet->raca_secundaria->nome : '';
                $cor_secundaria = isset($pet->cor_secundaria->descricao) ? " | " . $pet->cor_secundaria->descricao : '';
            @endphp

            <tr>
                <td style="width:30px">{{ $pet->id }}</td>
                <td>
                    <img src="{{ env('APP_URL') }}/storage/{{ $pet->path_img }}" class="chip-img ml-2 border border-{{ $pet->sexo == "M" ? 'blue' : 'pink' }}">
                    <span>
                        {{ $pet->nome }}
                        @if ($pet->sexo == "M")
                            <i class="fa fa-mars blue-text" aria-hidden="true"></i>
                        @else
                            <i class="fa fa-venus pink-text" aria-hidden="true"></i>
                        @endif
                    </span>
                </td>
                <td>{{ $pet->especie->nome }}</td>
                <td>{{ $idade}}</td>
                <td>{{ $pet->raca_predominante->nome }} {{ $raca_secundaria }}</td>
                <td>{{ $pet->cor_predominante->descricao }} {{ $cor_secundaria }}</td>
                <td>{{ $pet->porte->descricao }}</td>
                <td>
                    @if (!$pet->vivo)
                        <div class="chip py-0 black white-text tooltipped" data-position="top" data-tooltip="Falecido">
                            <i class="fas fa-bone"></i>
                        </div>
                    @else
                        @if ($pet->agressivo)
                            <div class="chip py-0 red lighten-1 white-text tooltipped" data-position="top" data-tooltip="Agressivo">
                                <i class="fas fa-angry"></i>
                            </div>
                        @endif
                        @if ($pet->apto_reproduzir)
                            <div class="chip py-0 green lighten-1 white-text tooltipped" data-position="top" data-tooltip="Apto à reproduzir">
                                <i class="fas fa-heart"></i>
                            </div>
                        @endif
                        @if ($pet->alergias != null)
                            <div class="chip py-0 orange white-text tooltipped" data-position="top" data-tooltip="Alérgico: {{ $pet->alergias }}">
                                <i class="fas fa-virus"></i>
                            </div>
                        @endif
                        @if ($pet->observacoes != null)
                            <div class="chip py-0 blue white-text tooltipped" data-position="top" data-tooltip="Observações: {{ $pet->observacoes }}">
                                <i class="fas fa-info"></i>
                            </div>
                        @endif
                    @endif
                </td>
                <td>{{ $pet->dono->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<br><br>
<script>
    $(document).ready(function(){
        $('.tooltipped').tooltip();
    });
</script>
