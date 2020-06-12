<div id="modalListaPets" class="modal">
    <div class="modal-content grey darken-4 p-0 gradient-modal-content">
        <h4 class="cyan darken-2 white-text p-4">
            Todos os meus PETs
            <a href="#" class="right modal-action modal-close white-text"><i class="fa fa-times fa-xs" aria-hidden="true"></i></a>
        </h4>
        <div class="row m-0">
            <div class="col l12 s12 white-text">
                @foreach ($petsLista as $pet)
                    <div class="row valign-wrapper my-1">
                        <div class="col l2 s2 center pr-0">
                            <img src="{{ asset('storage/'.$pet->path_img) }}" class="circle responsive-img pet-img z-depth-2 border border-{{ $pet->sexo == "M" ? 'blue' : 'pink' }}">
                        </div>
                        <div class="col l10 s10 pl-0">
                            <table class="p-0 table-borderless">
                                <tr>
                                    <th class="p-0">
                                        <h6 class="mt-1 font-weight-bold">
                                            {{ $pet->nome }}
                                            @if ($pet->sexo == "M")
                                                <i class="fa fa-mars blue-text" aria-hidden="true"></i>
                                            @else
                                                <i class="fa fa-venus pink-text" aria-hidden="true"></i>
                                            @endif
                                        </h6>
                                        @if (!$pet->vivo)
                                            <div class="chip py-0 black white-text">
                                                <i class="fas fa-bone"></i> Falecido
                                            </div>
                                        @else
                                            @if ($pet->agressivo)
                                                <div class="chip py-0 red lighten-1 white-text">
                                                    <i class="fas fa-angry"></i> Agressivo
                                                </div>
                                            @endif
                                            @if ($pet->apto_reproduzir)
                                                <div class="chip py-0 green lighten-1 white-text">
                                                    <i class="fas fa-heart"></i> Apto à reproduzir
                                                </div>
                                            @endif
                                            @if ($pet->alergias != null)
                                                <div id="tooltipAlergia" class="chip py-0 orange white-text" data-position="top" data-tooltip="{{ $pet->alergias }}">
                                                    <i class="fas fa-virus"></i> Alérgica
                                                </div>
                                            @endif
                                            @if ($pet->observacoes != null)
                                                <span class="font-weight-normal">Obs: <i class="{{ $pet->sexo == "M" ? 'blue' : 'pink' }}-text text-lighten-2">{{ $pet->observacoes }}</i></span>
                                            @endif
                                        @endif
                                    </th>
                                    <th class="p-0" rowspan="2">
                                        <a href="#modalPetUpdate{{ $pet->id }}" class="hide-on-small-only waves-effect waves-light btn btn-small cyan darken-1 font-weight-normal right modal-trigger">DETALHES</a>
                                        <a href="#modalPetUpdate{{ $pet->id }}" class="hide-on-med-and-up waves-effect waves-light btn btn-small cyan darken-1 font-weight-normal right modal-trigger"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                                    </th>
                                </tr>
                                @php
                                    $idade = \Carbon\Carbon::parse($pet->nascimento)->diff(\Carbon\Carbon::now())->format('%y anos, %m meses e %d dias');

                                    $raca_secundaria = isset($pet->raca_secundaria->nome) ? $pet->raca_secundaria->nome : '';
                                    $raca_secundaria_id = isset($pet->raca_secundaria_id) ? $pet->raca_secundaria_id : '';
                                    $raca_secundaria_show = isset($pet->raca_secundaria->nome) ? " | " . $pet->raca_secundaria->nome : '';

                                    $cor_secundaria = isset($pet->cor_secundaria->descricao) ? $pet->cor_secundaria->descricao : '';
                                    $cor_secundaria_id = isset($pet->cor_secundaria_id) ? $pet->cor_secundaria_id : '';
                                    $cor_secundaria_show = isset($pet->cor_secundaria->descricao) ? " | " . $pet->cor_secundaria->descricao : '';
                                @endphp
                                <tr>
                                    <td class="p-0">
                                        <span>{{ $pet->especie->nome }} • {{ $pet->raca_predominante->nome }} {{ $raca_secundaria_show }} • Porte {{ $pet->porte->descricao }} • Pelo {{ $pet->pelo->descricao }}</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr class="my-0">
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#tooltipAlergia').tooltip();
    });
</script>
