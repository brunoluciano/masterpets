<div id="agendamento" class="col l12 s12 gradient-tab-content">
    <div class="row">
        <div class="col l4 s12">
            <div class="input-field col l12 s12 mt-4">
                <form id="agendamento_disponivel_form" action="{{ route('agendamento.consultar') }}" method="POST">
                    @csrf

                    <label for="data_evento" class="dark-text">Data</label>
                    <input id="data_evento" type="text" name="data_evento" class="datepicker dark-text" placeholder="Informe a data para o agendamento" autocomplete="off" required>
                    <span id="data_invalida" class="helper-text data-error" style="display:none;">É necessário informar uma data válida! (Ex: Data atual ou posterior)</span>
                    <button id="verificar_disponibilidade" class="btn waves-effect waves-light cyan btn-block" type="submit" name="action">
                        Verificar disponibilidade <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="col l8 s12">
            <table>
                <thead>
                    <tr class="grey-text text-darken-2">
                        <th>Horário</th>
                        <th>Evento</th>
                    </tr>
                </thead>
                <tbody id="table_agendamentos">
                    @for ($i = 8; $i <= 18; $i++)
                        <tr>
                            <td>{{ $i }}:00</td>
                            <td>
                                <a href="#" class="waves-effect waves-light btn right"><i class="fas fa-plus-circle"></i> Novo Evento</a>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#verificar_disponibilidade").click(function(e){
            // e.preventDefault();

            var data_evento = $("#data_evento").val();
            console.log(data_evento);


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
            type: 'POST',
            url: '{!! URL::to('home/cliente/findAgendamentos') !!}',
            dataType: "json",
            data: $('#agendamento_disponivel_form').serialize(),
            success:function(response){
                if(response.success == false){
                    $("#data_invalida").show();
                } else {
                    console.log(response.indisponivel.length);
                    $("#data_invalida").hide();

                    $("#table_agendamentos").empty();
                    response.indisponivel.forEach(el => {
                        if(el.disponivel == false){
                            var msg = "Horário já reservado!";
                        } else {
                            var msg = "";
                        }
                        $("#table_agendamentos").prepend("<tr><td>"+el.horario+"</td>"+
                                                             "<td>"+msg+"</td>"+
                                                             "<td><a href='#'' class='waves-effect waves-light btn right disabled'><i class='fas fa-plus-circle'></i> Novo Evento</a></td></tr>")
                    });


                }



            }
        })
        });


    })
</script>

