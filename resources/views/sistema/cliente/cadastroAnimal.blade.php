<div id="modalPets" class="modal modal-fixed-footer modal-fluid">
    <div class="modal-content grey darken-4 p-0 gradient-modal-content">
        <h4 class="cyan darken-2 white-text p-4">
            Adicionar PET
            <a href="#" class="right modal-action modal-close white-text"><i class="fa fa-times fa-xs" aria-hidden="true"></i></a>
        </h4>
        <div class="row m-0 pt-3">
    <form class="col s12" action="{{ route('animal.store') }}" method="POST">
        {{ csrf_field() }}

            <div class="col l8 s12">
                <div class="row">
                    <div class="input-field col l6 s12">
                        <input id="nome" type="text" name="nome" class="validate @error('nome') invalid @enderror" required>
                        <label for="nome">Nome</label>
                        @error('nome')
                            <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-field col l6 s12">
                        <input type="text" id="especie" class="autocomplete" name="especie" autocomplete="off" required>
                        <input type="hidden" id="especie_id" name="especie_id" required>
                        <label for="autocomplete-input">Espécie</label>
                        @error('especie')
                            <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col l6 s12">
                        <input disabled id="dono" type="text" name="dono" class="validate" value="{{ $cliente->name }}">
                        <input type="hidden" id="dono_id" name="dono_id" value="{{ $cliente->id }}">
                        <label for="dono">Dono</label>
                        @error('dono')
                            <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-field col l6 s12">
                        <input id="nascimentoAnimal" type="text" name="nascimento" class="datepicker" required>
                        <label for="nascimento">Nascimento</label>
                        <i class="fas fa-calendar-alt fa-xs prefix right white-text" aria-hidden="true"></i>
                        @error('nascimento')
                            <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col l4 s12">
                        <input id="raca_predominante" type="text" name="raca_predominante" class="autocomplete" autocomplete="off" required>
                        <input type="hidden" id="raca_predominante_id" name="raca_predominante_id" required>
                        <label for="raca_predominante">Raça Predominante</label>
                        @error('raca_predominante')
                            <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-field col l4 s12">
                        <input id="raca_secundaria" type="text" name="raca_secundaria" class="autocomplete" autocomplete="off">
                        <input type="hidden" id="raca_secundaria_id" name="raca_secundaria_id">
                        <label for="raca_secundaria">Raça Secundária</label>
                        @error('raca_secundaria')
                            <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-field col l4 s12 select-light-text white-arrow">
                        <select name="porte_id" required>
                            <option value="" disabled selected>Escolha o porte do animal</option>
                            @foreach ($portes as $porte)
                                <option value="{{ $porte->id }}">{{ $porte->descricao }}</option>
                            @endforeach
                        </select>
                        <label>Porte</label>
                        @error('porte_id')
                            <span class="helper-text" data-error="wrong" data-success="right">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col l4 s12">
                        <input id="cor_predominante" type="text" name="cor_predominante" class="autocomplete" autocomplete="off" required>
                        <input type="hidden" id="cor_predominante_id" name="cor_predominante_id" required>
                        <label for="cor_predominante">Cor Predominante</label>
                        @error('cor_predominante')
                            <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-field col l4 s12">
                        <input id="cor_secundaria" type="text" name="cor_secundaria" class="autocomplete" autocomplete="off">
                        <input type="hidden" id="cor_secundaria_id" name="cor_secundaria_id">
                        <label for="cor_secundaria">Cor Secundária</label>
                        @error('cor_secundaria')
                            <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-field col l4 s12 select-light-text white-arrow">
                        <select name="pelo_id" required>
                            <option value="" disabled selected>Escolha o pelo do animal</option>
                            @foreach ($pelos as $pelo)
                                <option value="{{ $pelo->id }}">{{ $pelo->descricao }}</option>
                            @endforeach
                        </select>
                        <label>Pelo</label>
                        @error('pelo_id')
                            <span class="helper-text" data-error="wrong" data-success="right">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col l12 s12">
                        <textarea id="alergias" name="alergias" class="materialize-textarea" data-length="250"></textarea>
                        <label for="alergias" class="counter-light">Alergias</label>
                        @error('alergias')
                            <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col l12 s12">
                        <textarea id="observacoes" name="observacoes" class="materialize-textarea" data-length="250"></textarea>
                        <label for="observacoes" class="counter-light">Observações</label>
                        @error('observacoes')
                            <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col l3 offset-l1 s12">
                <label class="white-text">
                    <input name="sexo" value="M" type="radio" checked />
                    <span>Macho</span>
                </label>
                <label class="ml-3 white-text">
                    <input name="sexo" value="F" type="radio" />
                    <span>Fêmea</span>
                </label>

                <p>
                    <label class="white-text">
                        <input disabled type="checkbox" name="vivo" value="1" checked/>
                        <span>Vivo</span>
                    </label>
                </p>
                <p>
                    <label class="white-text">
                        <input type="checkbox" name="agressivo" value="1" />
                        <span>Agressivo</span>
                    </label>
                </p>
                <p>
                    <label class="white-text">
                        <input type="checkbox" name="apto_reproduzir" value="1"/>
                        <span>Apto à reprodução</span>
                    </label>
                </p>
                <br>
                <div class="row center-align">
                    <span class="white-text">Adicionar Foto</span>
                    <div class="file-field input-field">
                        <div class="btn rounded-circle waves-effect waves-light">
                            <span><i class="fa fa-camera" aria-hidden="true"></i></span>
                            <input type="file">
                        </div>
                        <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                        </div>
                    </div>
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
        $.ajax({
            type: 'get',
            url: '{!! URL::to('home/cliente/findEspecies') !!}',
            success:function(response){
                console.log(response);
                // converter array para object
                var espArray = response;
                var dataEsp = {};
                var dataEsp2 = {};
                for (var i = 0; i < espArray.length; i++) {
                    dataEsp[espArray[i].nome] = null;
                    dataEsp2[espArray[i].nome] = espArray[i];
                }
                console.log(dataEsp2);

                // materialize css
                $('input#especie').autocomplete({
                    data: dataEsp,
                    onAutocomplete:function(reqdata){
                        console.log(dataEsp2[reqdata])
                        $('input#especie_id').val(dataEsp2[reqdata]['id']);
                    }
                });
            }
        })

        $.ajax({
            type: 'get',
            url: '{!! URL::to('home/cliente/findRacas') !!}',
            success:function(response){
                console.log(response);
                // converter array para object
                var racArray = response;
                var dataRac = {};
                var dataRac2 = {};
                for (var i = 0; i < racArray.length; i++) {
                    dataRac[racArray[i].nome] = null;
                    dataRac2[racArray[i].nome] = racArray[i];
                }
                console.log(dataRac2);

                // materialize css
                $('input#raca_predominante').autocomplete({
                    data: dataRac,
                    onAutocomplete:function(reqdata){
                        console.log(dataRac2[reqdata])
                        $('input#raca_predominante_id').val(dataRac2[reqdata]['id']);
                    }
                });
                $('input#raca_secundaria').autocomplete({
                    data: dataRac,
                    onAutocomplete:function(reqdata){
                        console.log(dataRac2[reqdata])
                        $('input#raca_secundaria_id').val(dataRac2[reqdata]['id']);
                    }
                });
            }
        })

        $.ajax({
            type: 'get',
            url: '{!! URL::to('home/cliente/findCores') !!}',
            success:function(response){
                console.log(response);
                // converter array para object
                var corArray = response;
                var dataCor = {};
                var dataCor2 = {};
                for (var i = 0; i < corArray.length; i++) {
                    dataCor[corArray[i].descricao] = null;
                    dataCor2[corArray[i].descricao] = corArray[i];
                }
                console.log(dataCor2);

                // materialize css
                $('input#cor_predominante').autocomplete({
                    data: dataCor,
                    onAutocomplete:function(reqdata){
                        console.log(dataCor2[reqdata])
                        $('input#cor_predominante_id').val(dataCor2[reqdata]['id']);
                    }
                });
                $('input#cor_secundaria').autocomplete({
                    data: dataCor,
                    onAutocomplete:function(reqdata){
                        console.log(dataCor2[reqdata])
                        $('input#cor_secundaria_id').val(dataCor2[reqdata]['id']);
                    }
                });
            }
        })
    });
</script>

<script>
    $(document).ready(function() {
       $('textarea#alergias, textarea#observacoes').characterCounter();
   });
</script>

{{-- <script>
    $(document).ready(function(){
        $('#nascimentoAnimal').datepicker({
            container: 'body'
        });
    });
</script> --}}
