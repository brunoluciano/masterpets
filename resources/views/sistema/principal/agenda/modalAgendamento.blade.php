@for ($i = 1; $i <= 11; $i++)
<div id="modalAgendamento{{ $i }}" class="modal modal-fixed-footer">
    <div class="modal-content grey darken-4 p-0 gradient-modal-content">
        <h4 class="cyan darken-2 white-text p-4">
            Novo Agendamento
            <a href="#" class="right modal-action modal-close white-text"><i class="fa fa-times fa-xs" aria-hidden="true"></i></a>
        </h4>
        <div class="row m-0 pt-3">
    <form class="col s12" action="{{ route('agendamento.store') }}" method="POST">
        @csrf
            <div class="row">
                <div class="input-field col l6 s12">
                    <label id="data_evento_label">Data do Agendamento</label>
                    <input readonly id="data_evento_modal{{ $i }}" type="text" name="data_evento_modal" autocomplete="off" required>
                </div>
                <div class="input-field col l6 s12">
                    @php
                        $hora = $i+7 . ":00";
                        $hora_agendamento = new \Carbon\Carbon($hora);
                        $hora_agendamento = $hora_agendamento->format('H:i');
                    @endphp
                    <label for="horario_evento_modal">Horário</label>
                    <input readonly id="horario_evento_modal" type="text" name="horario_evento_modal" value="{{ $hora_agendamento }}" autocomplete="off" required>
                </div>
            </div>
            <div class="row">
                <div class="input-field col l4 s12 select-light-text white-arrow">
                    <select name="animal_id" required>
                        <option value="" disabled selected>Escolha o pet</option>
                        @foreach ($petsLista as $pet)
                            <option value="{{ $pet->id }}">{{ $pet->nome }}</option>
                        @endforeach
                    </select>
                    <label>Pet</label>
                </div>
                <div class="input-field col l4 s12">
                    <label for="evento_modal">Evento</label>
                    <input id="evento_modal" type="text" name="evento_modal" autocomplete="off" required>
                    <input type="hidden" id="evento_id_modal" name="evento_id" required>
                </div>
                <div class="input-field col l4 s12">
                    <label id="valor_servico_label">Valor</label>
                    <input readonly id="valor_servico{{ $i }}" type="text" name="valor_servico" autocomplete="off" required>
                </div>
            </div>
            <div class="row">
                <div class="input-field col l12 s12">
                    <textarea id="textarea1" class="materialize-textarea" name="observacao" data-length="250"></textarea>
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
        $('#modalAgendamento{{ $i }}').modal();

        $("#verificar_disponibilidade").click(function(e){
            var data_evento = $("#data_evento").val();
            $('#data_evento_modal{{ $i }}').val(data_evento);
            $('label#data_evento_label').addClass('active');
        });
    });
</script>
@endfor

<script>
    $(document).ready(function(){
        $('select').formSelect();
        $('input#input_text, textarea#textarea1').characterCounter();
    });
</script>

<script>
    $(document).ready(function(){
        $.ajax({
            type: 'get',
            url: '{!! URL::to('home/cliente/findEventos') !!}',
            success:function(response){
                console.log(response);
                // converter array para object
                var proArray = response;
                var dataPro = {};
                var dataPro2 = {};
                for (var i = 0; i < proArray.length; i++) {
                    dataPro[proArray[i].descricao] = null;
                    dataPro2[proArray[i].descricao] = proArray[i];
                }
                console.log(dataPro2);

                // materialize css
                $('input#evento_modal').autocomplete({
                    data: dataPro,
                    onAutocomplete:function(reqdata){
                        console.log(dataPro2[reqdata])
                        $('input#evento_id_modal').val(dataPro2[reqdata]['id']);

                        var valor_servico = dataPro2[reqdata]['valor'];
                        valor_servico = valor_servico.toFixed(2).toString().replace(".", ",");

                        for (let i = 1; i <= 11; i++) {
                            $("#valor_servico"+i).val("R$ "+valor_servico);
                        }
                        $('label#valor_servico_label').addClass('active');
                    }
                })
            }
        })
    })
</script>

