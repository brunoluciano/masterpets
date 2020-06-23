<div id="agendamento" class="col l12 s12 gradient-tab-content">
    <div class="row">
        <div class="col l4 s12">
            <div class="input-field col l12 s12 mt-4">
                <form id="agendamento_disponivel_form" action="{{ route('agendamento.consultar') }}" method="POST">
                    @csrf

                    <label for="data_evento" class="dark-text">Data</label>
                    <input id="data_evento" type="text" name="data_evento" class="datepicker dark-text" value="{{ $hoje }}" placeholder="Informe uma data para agendamento" autocomplete="off" required>
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
                        <th></th>
                    </tr>
                </thead>
                <tbody id="table_agendamentos">
                    @for ($i = 0; $i <= 10; $i++)
                        <tr>
                            <td>{{ $i+8 }}:00</td>
                            <td>
                                <a href="#modalAgendamento{{ $i+1 }}" class="waves-effect waves-light btn right modal-trigger"><i class="fas fa-plus-circle"></i> Novo Evento</a>
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
            e.preventDefault();

            var data_evento = $("#data_evento").val();
            $('#data_evento_modal').val(data_evento);

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
                    $("#data_invalida").hide();
                    $("#table_agendamentos").empty();
                    let i = 0;
                    let cont = 11;
                    let cont_user = 0;
                    let cont_pet = 0;
                    let botao = "";

                    for (let j = 0; j < response['agendamentos'].length; j++) {
                        // console.log(response['indisponivel'][j].disponivel);
                    }

                    let msg;
                    let id = "{{ $cliente->id }}";
                    for (let j = 0; j < response['indisponivel'].length; j++) {
                        if (response['indisponivel'][j].disponivel == false) {
                            if(id == response['agendamentos'][cont_user].usuario_id){
                                let agendamento_id = response['meuAgendamento'][cont_pet].id;
                                let servico = response['meuAgendamento'][cont_pet].servico.descricao;
                                let servico_preco = response['meuAgendamento'][cont_pet].servico.valor;
                                servico_preco = servico_preco.toFixed(2).toString().replace(".", ",");
                                let pet = response['meuAgendamento'][cont_pet].pet.nome;
                                let pet_img = response['meuAgendamento'][cont_pet].pet.path_img;
                                let pet_sexo = response['meuAgendamento'][cont_pet].pet.sexo;
                                let pet_sexo_cor = pet_sexo == "M" ? "blue" : "pink";
                                let url_pet_img = parse('{{ asset("storage/%s") }}',pet_img);
                                let observacao = response['meuAgendamento'][cont_pet].observacoes != null ? " • <i>Obs: "+response['meuAgendamento'][cont_pet].observacoes+"</i>" : "";

                                // função para concatenar variável com string
                                function parse(str) {
                                    var args = [].slice.call(arguments, 1),
                                        i = 0;
                                    return str.replace(/%s/g, () => args[i++]);
                                }
                                
                                msg = "<img src='"+url_pet_img+"' class='mr-1 circle responsive-img pet-img-list z-depth-1 border border-"+pet_sexo_cor+"'>"+pet+" • "+servico+" • R$ "+servico_preco+observacao;
                                botao = "<td><a href='#modalAgendamentoEditar"+agendamento_id+"' class='waves-effect waves-light btn right modal-trigger cyan darken-1'><i class='fas fa-edit'></i> EDITAR</a></td>"
                                cont_pet++;
                            } else {
                                msg = "<b>Horário indisponível!</b>";
                                botao = "<td><a href='#' class='waves-effect waves-light btn right disabled'><i class='fas fa-plus-circle'></i> Novo Evento</a></td>";
                            }
                        
                            $("#table_agendamentos").prepend("<tr><td>"+response['indisponivel'][j].horario+"</td>"+
                                                             "<td class='valign-wrapper'>"+msg+"</td>"+botao+"</tr>");
                            cont_user++;
                        } else {
                            $("#table_agendamentos").prepend("<tr><td>"+response['indisponivel'][j].horario+"</td>"+
                                                             "<td></td>"+
                                                             "<td><a href='#modalAgendamento"+cont+"' class='waves-effect waves-light btn right modal-trigger'><i class='fas fa-plus-circle'></i> Novo Evento</a></td></tr>");    
                        }  
                        cont--;
                        i++;   
                    }
                }
            }
        })
        });

    })
</script>

