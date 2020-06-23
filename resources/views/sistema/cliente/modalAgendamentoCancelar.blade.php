@foreach ($meusAgendamentos as $agendamento)
<div id="modalCancelarAgendamento{{ $agendamento->id }}" class="modal">
    <div class="modal-content grey darken-4 p-0 gradient-modal-content">
        <h4 class="cyan darken-2 white-text p-4">
            Cancelar Agendamento
            <a href="#" class="right modal-action modal-close white-text"><i class="fa fa-times fa-xs" aria-hidden="true"></i></a>
        </h4>
        <div class="row white-text center-align mb-0 py-4">
            <h6 class="my-0">Você tem certeza que deseja cancelar o agendamento do dia {{ \Carbon\Carbon::parse($agendamento->data_evento)->format('d/m/Y') }}?</h6>
        </div>
    </div>
    <div class="modal-footer cyan darken-4 pr-4">
        <form action="{{ route('agendamento.destroy', $agendamento->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn waves-effect waves-light red mb-0 hoverable" type="submit" name="action">Confirmar
                <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
            <a href="#" class="waves-effect waves-light btn grey mb-0 hoverable modal-action modal-close">Cancelar</a>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#modalCancelarAgendamento{{ $agendamento->id }}').modal();
    });
</script>
@endforeach