<script>
    var agendamentos = [];
</script>
@foreach($meusAgendamentos as $agendamento)
<div id="modalAgendamentoEditar{{ $agendamento->id }}" class="modal modal-fixed-footer">
    <div class="modal-content grey darken-4 p-0 gradient-modal-content">
        <h4 class="cyan darken-2 white-text p-4">
            Editar Agendamento
            <a href="#" class="right modal-action modal-close white-text"><i class="fa fa-times fa-xs" aria-hidden="true"></i></a>
            <a href="#modalCancelarAgendamento{{ $agendamento->id }}" class="waves-effect waves-light btn right red lighten-2 mt-1 mr-2 modal-trigger">Cancelar Agendamento <i class="fas fa-trash"></i></a>
        </h4>
        <div class="row m-0 pt-3">
    <form class="col s12" action="{{ route('agendamento.update', $agendamento->id) }}" method="POST">
        @csrf
        @method('PUT')
            <div class="row">
                <div class="input-field col l6 s12">
                    <label id="data_evento_label">Data do Agendamento</label>
                    <input readonly id="data_evento_modal_editar" type="text" name="data_evento_modal" value="{{ $agendamento->data_evento }}"autocomplete="off" required>
                </div>
                <div class="input-field col l6 s12">
                    <label for="horario_evento_modal">Horário</label>
                    <input readonly id="horario_evento_modal" type="text" name="horario_evento_modal" value="{{ \Carbon\Carbon::parse($agendamento->hora_inicio)->format('H:i') }}" autocomplete="off" required>
                </div>
            </div>
            <div class="row">
                <div class="input-field col l4 s12 select-light-text white-arrow">
                    <select name="animal_id" required>
                        <option value="" disabled selected>Escolha o pet</option>
                        @foreach ($petsLista as $pet)
                            @php
                                $selected = $pet->id == $agendamento->pet_id ? "selected" : "";
                            @endphp
                            <option value="{{ $pet->id }}" {{ $selected }}>{{ $pet->nome }}</option>
                        @endforeach
                    </select>
                    <label>Pet</label>
                </div>
                <div class="input-field col l4 s12">
                    <label for="evento_modal">Evento</label>
                    <input id="evento_modal_edit" type="text" name="evento_modal" value="{{ $agendamento->servico->descricao }}" autocomplete="off" required>
                    <input type="hidden" id="evento_id_modal_edit" name="evento_id" value="{{ $agendamento->servico->id }}" required>
                </div>
                <div class="input-field col l4 s12">
                    <label id="valor_servico_label">Valor</label>
                    <input readonly id="valor_servico_edit{{ $agendamento->id }}" type="text" name="valor_servico" value="R$ {{ number_format($agendamento->servico->valor,2,',','.') }}" autocomplete="off" required>
                </div>
            </div>
            <div class="row">
                <div class="input-field col l12 s12">
                    <textarea id="textarea1" class="materialize-textarea" name="observacao" data-length="250">{{ $agendamento->observacoes }}</textarea>
                    <label for="textarea1" class="counter-light">Mensagem</label>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer cyan darken-4 pr-4">
        <button class="btn waves-effect waves-light green mb-0 hoverable" type="submit" name="action">Confirmar
            <i class="material-icons right">send</i>
        </button>
        <a href="#" class="waves-effect waves-light btn grey mb-0 hoverable modal-action modal-close">Cancelar</a>
    </div>
    </form>
</div>
<script>
    $(document).ready(function(){
        $('#modalAgendamentoEditar{{ $agendamento->id }}').modal();

        $("#verificar_disponibilidade").click(function(e){
            var data_evento = $("#data_evento").val();
            $('#data_evento_modal_editar{{ $agendamento->id }}').val(data_evento);
            $('label#data_evento_label').addClass('active');
        });

        agendamentos.push("{{ $agendamento->id }}");
    });

</script>
@endforeach

<script>
    $(document).ready(function(){
        $('select').formSelect();
        $('input#input_text, textarea#textarea1').characterCounter();
        // console.log(arrayAgendamentos);
    });
</script>

<script>
    $(document).ready(function(){
        $.ajax({
            type: 'get',
            url: '{!! URL::to('home/cliente/findEventos') !!}',
            success:function(response){
                // converter array para object
                var proArray = response;
                var dataPro = {};
                var dataPro2 = {};
                for (var i = 0; i < proArray.length; i++) {
                    dataPro[proArray[i].descricao] = null;
                    dataPro2[proArray[i].descricao] = proArray[i];
                }

                // materialize css
                $('input#evento_modal_edit').autocomplete({
                    data: dataPro,
                    onAutocomplete:function(reqdata){
                        $('input#evento_id_modal_edit').val(dataPro2[reqdata]['id']);

                        var valor_servico = dataPro2[reqdata]['valor'];
                        // let agendamento_id = "{{ $agendamento->id }}"
                        valor_servico = valor_servico.toFixed(2).toString().replace(".", ",");

                        agendamentos.forEach(el => {
                            console.log(el)
                            $("#valor_servico_edit"+el).val("R$ "+valor_servico);
                            $('label#valor_servico_label').addClass('active');
                        });
                    }
                })
            }
        })
    })
</script>
