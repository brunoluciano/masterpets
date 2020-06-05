<div id="modalListaPets" class="modal">
    <div class="modal-content grey darken-4 p-0 gradient-modal-content">
        <h4 class="cyan darken-2 white-text p-4">
            Todos os meus PETs
            <a href="#" class="right modal-action modal-close white-text"><i class="fa fa-times fa-xs" aria-hidden="true"></i></a>
        </h4>
        <div class="row m-0">
            <div class="col l12 white-text">
                @foreach ($petsLista as $pet)
                    <div class="row valign-wrappe my-1">
                        <div class="col l2 s1 center pr-0">
                            <img src="{{ asset('images/cao.jpg') }}" class="circle responsive-img pet-img">
                        </div>
                        <div class="col l10 s11 pl-0">
                            <table class="p-0 table-borderless">
                                <tr>
                                    <th class="p-0"><h6 class="mt-1 font-weight-bold">{{ $pet->nome }}</h6></th>
                                    <th class="p-0" rowspan="2"><a href="#" class="waves-effect waves-light btn btn-small cyan darken-1 font-weight-normal right">DETALHES</a></th>
                                </tr>
                                <tr>
                                    <td class="p-0"><span>{{ $pet->especie->nome }} • {{ $pet->raca_predominante->nome }}</span></td>
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
