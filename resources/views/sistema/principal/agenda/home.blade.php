@extends('layouts.sistema')

@section('content')
    <div class="container-fluid p-4">
        <div class="row">
            <h2 class="my-0 ml-3 grey-text text-darken-2">Agenda <i class="fas fa-calendar-alt"></i></h2>
            <div id="agendamento" class="col l12 s12 gradient-tab-content">
                <div class="row">
                    <div class="col l4 s12">
                        <div class="input-field col l12 s12 mt-4">
                            <form id="agendamento_disponivel_form" action="{{ route('agendamento.consultar') }}" method="POST">
                                @csrf

                                <label for="data_evento" class="dark-text">Data</label>
                                <input id="data_evento" type="text" name="data_evento" class="datepicker dark-text" placeholder="Informe uma data para agendamento" autocomplete="off" required>
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
        </div>
    </div>
@include('sistema.principal.agenda.modalAgendamento')

<script src="{{ asset('js/configDatepicker.js')}}"></script>
<script>
    $(document).ready(function(){
        $('select').formSelect();
    });
</script>

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
                    var cont = 11;
                    response.indisponivel.forEach(el => {
                        if(el.disponivel == false){
                            $("#table_agendamentos").prepend("<tr><td>"+el.horario+"</td>"+
                                                                "<td>Horário indisponível!</td>"+
                                                                "<td><a href='#' class='waves-effect waves-light btn right disabled'><i class='fas fa-plus-circle'></i> Novo Evento</a></td></tr>");
                        } else {
                            $("#table_agendamentos").prepend("<tr><td>"+el.horario+"</td>"+
                                                                "<td></td>"+
                                                                "<td><a href='#modalAgendamento"+cont+"' class='waves-effect waves-light btn right modal-trigger'><i class='fas fa-plus-circle'></i> Novo Evento</a></td></tr>");
                        }
                        console.log(cont)
                        cont = cont - 1;
                    });
                }
            }
        })
        });

    })
</script>
@endsection
