@extends('layouts.website')

@section('title', '| Contato')

@section('content')
    <div class="container mb-4">
        <h1 class="tituloContato mb-0 grey-text text-darken-2">Contato</h1>
        <img class="imgContato" src="{{ asset('images/caoGatoContato.png') }}">
        <div class="bg-contato-gradient rounded-lg p-4 z-depth-2">
            <div class="row mb-0 pb-0">
                <div class="col l6 s12 white-text">
                    <h4 class="font-weight-light center">Envie-nos uma mensagem!</h4>
                    <hr class="divider">
                    <br>
                    <h6 class="font-italic">Tem alguma dúvida, crítica ou sugestão? Envie uma mensagem agora mesmo e entraremos em contato o quanto antes!</h6>
                </div>
                <div class="col l6 s12">
                    <div class="row">
                        <form class="col s12">
                            <div class="row mb-0">
                                <div class="input-field col l6 s12">
                                    <input id="last_name" type="text" class="validate">
                                    <label for="last_name">Nome</label>
                                </div>
                                <div class="input-field col l6 s12">
                                    <input id="last_name" type="text" class="validate">
                                    <label for="last_name">Telefone</label>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="input-field col l6 s12">
                                    <input id="last_name" type="email" class="validate">
                                    <label for="last_name">E-mail</label>
                                </div>
                                <div class="input-field col l6 s12 select-light-text white-arrow">
                                    <select>
                                        <option value="" disabled selected>Escolha uma opção</option>
                                        <option value="1">Agendamento</option>
                                        <option value="2">Consulta</option>
                                        <option value="3">Dúvida</option>
                                        <option value="4">Sugestão</option>
                                        <option value="5">Crítica</option>
                                    </select>
                                    <label>Assunto</label>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="input-field col l12 s12">
                                    <textarea id="textarea1" class="materialize-textarea" data-length="250"></textarea>
                                    <label for="textarea1" class="counter-light">Mensagem</label>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <button class="btn waves-effect waves-light btn-block rounded-pill" type="submit" name="action">ENVIAR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
    <script>
         $(document).ready(function() {
            $('input#input_text, textarea#textarea1').characterCounter();
        });
    </script>
@endsection
