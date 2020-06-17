<div id="modalAgendamento" class="modal modal-fixed-footer">
    <div class="modal-content grey darken-4 p-0 gradient-modal-content">
        <h4 class="cyan darken-2 white-text p-4">
            Novo Agendamento
            <a href="#" class="right modal-action modal-close white-text"><i class="fa fa-times fa-xs" aria-hidden="true"></i></a>
        </h4>
        <div class="row m-0 pt-3">
    <form class="col s12" action="{{ route('animal.store') }}" method="POST">
        @csrf
            <div class="row">
                <div class="input-field col l6 s12">
                    <label for="data_evento_modal">Data do Agendamento</label>
                    <input id="data_evento_modal" type="text" name="data_evento_modal" class="datepicker" value="{{ \Carbon\Carbon::now() }}" autocomplete="off" disabled required>
                </div>
                <div class="input-field col l6 s12">
                    <label for="horario_evento_modal">Horário</label>
                    <input id="horario_evento_modal" type="text" name="horario_evento_modal" class="datepicker disabled" value="08:00" autocomplete="off" disabled required>
                </div>
            </div>
            <div class="row">
                <div class="input-field col l4 s12 select-light-text white-arrow">
                    <select name="porte_id">
                        <option value="" disabled selected>Escolha o pet</option>
                        @foreach ($petsLista as $pet)
                            <option value="{{ $pet->id }}">{{ $pet->nome }}</option>
                        @endforeach
                    </select>
                    <label>Pet</label>
                </div>
                <div class="input-field col l4 s12">
                    <label for="horario_evento_modal">Evento</label>
                    <input id="horario_evento_modal" type="text" name="horario_evento_modal" autocomplete="off" >
                    <input type="hidden" id="horario_evento_id_modal" name="horario_evento_id_modal" >
                </div>
                <div class="input-field col l4 s12">
                    <label id="valor_servico_label">Valor</label>
                    <input id="valor_servico" type="text" name="valor_servico" autocomplete="off" disabled required>
                </div>
            </div>
            <div class="row">
                <div class="input-field col l12 s12">
                    <textarea id="textarea1" class="materialize-textarea" data-length="250"></textarea>
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
                $('input#horario_evento_modal').autocomplete({
                    data: dataPro,
                    onAutocomplete:function(reqdata){
                        console.log(dataPro2[reqdata])
                        $('input#horario_evento_id_modal').val(dataPro2[reqdata]['id']);

                        $('label#valor_servico_label').addClass('active');
                        var valor_servico = dataPro2[reqdata]['valor'];
                        valor_servico = valor_servico.toFixed(2).toString().replace(".", ",");
                        $("#valor_servico").val("R$ "+valor_servico);
                    }
                })

                // materialize css
                // $('input#horario_evento_modal').autocomplete({
                //     data: dataEve,
                //     onAutocomplete:function(response){
                //         // console.log(dataEve[response])
                //         $('input#horario_evento_id_modal').val(dataEve[response]['id']);

                //         var valor_servico = dataEve[response]['valor'];
                //         valor_servico = valor_servico.toFixed(2).toString().replace(".", ",");
                //         $("#valor_servico").val("R$ "+valor_servico);
                //     }
                // });
            
        }
    })
    })
</script>

