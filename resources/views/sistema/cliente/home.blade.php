@extends('layouts.sistema')

@section('content')
    @can('isCliente')
    <div class="container py-4">
        <div class="row">
            <div class="col l5 s12 p-4 rounded z-depth-2 card-info-user">
                <div class="row my-0">
                    <h4 class="m-0 pl-2">
                        <span class="teal-text text-darken-2 font-weight-light"><b>{{ $cliente->name }}</b></span>
                        <a href="#modalCliente" class="waves-effect waves-light btn right cyan darken-1 mr-2 modal-trigger">DETALHES</a>
                    </h4>

                </div>
                <br>
                <div class="row my-0 pl-2">
                    <div class="font-italic grey-text text-darken-2">
                        <p class="m-0">{{ $cliente->email }}</p>
                        <p class="m-0">{{ $cliente->endereco . " - " . $cliente->bairro}}</p>
                        <p class="m-0">{{ $cliente->cidade }} - {{ $cliente->estado->uf }}</p>
                        <p class="m-0">{{ $cliente->telefone }}</p>
                    </div>
                </div>
            </div>
            <br class="hide-on-large-only">
            <div class="col l6 offset-l1 s12 px-4 py-2 rounded z-depth-2 card-info-user">
                <div class="row my-0 mb-2">
                    <h5 class="m-0 pl-2">
                        <span class="teal-text text-darken-2 font-weight-bold">Meus PETS</span>
                        <a href="#modalPets" class="waves-effect waves-light teal-text right mr-2 modal-trigger"><i class="fas fa-plus"></i></a>
                    </h5>
                </div>
                <div class="row my-0 pl-2">
                    <div class="row valign-wrappe my-1">
                        <div class="col l2 s1 center pr-0">
                            <img src="{{ asset('images/cao.jpg') }}" class="circle responsive-img pet-img">
                        </div>
                        <div class="col l10 s11 pl-0">
                            <table class="p-0 table-borderless">
                                <tr>
                                    <th class="p-0"><h6 class="mt-1 font-weight-bold">Ted</h6></th>
                                    <th class="p-0" rowspan="2"><a href="#" class="waves-effect waves-light btn btn-small cyan darken-1 font-weight-normal right">DETALHES</a></th>
                                </tr>
                                <tr>
                                    <td class="p-0"><span>Canino • Poddle • 3 anos • 6 kg</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="row valign-wrappe my-1">
                        <div class="col l2 s1 center pr-0">
                            <img src="{{ asset('images/gato.jpg') }}" class="circle responsive-img pet-img">
                        </div>
                        <div class="col l10 s11 pl-0">
                            <table class="p-0 table-borderless">
                                <tr>
                                    <th class="p-0"><h6 class="mt-1 font-weight-bold">Ted</h6></th>
                                    <th class="p-0" rowspan="2"><a href="#" class="waves-effect waves-light btn btn-small cyan darken-1 right font-weight-normal">DETALHES</a></th>
                                </tr>
                                <tr>
                                    <td class="p-0"><span>Canino • Poddle • 3 anos • 6 kg</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr class="my-0">
                    <a href="#" class="my-0 grey-text text-darken-2 hover-link">Ver todos</a>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col l12 s12 fix-tabs-content">
                <ul id="tabs-swipe" class="tabs">
                    <li class="tab col l3 s6"><a class="active" href="#agendamento">Agendamento</a></li>
                    <li class="tab col l3 s6"><a href="#conta">Conta</a></li>
                </ul>
                <div id="agendamento" class="col l12 s12 gradient-tab-content">
                    <div class="row">
                        <div class="col l4 s12">
                            <div class="input-field col l12 s12 mt-4">
                                <input id="nascimento" type="text" name="data" id="data" class="datepicker" placeholder="Informe a data para o agendamento" required>
                                <label for="nascimento" class="dark-text">Data</label>
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
                                <tbody>
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
                <div id="conta" class="col l12 s12 gradient-tab-content">
                    <a href="#" class="teal-text link-hover right">Imprimir Conta<i class="fa fa-print ml-1" aria-hidden="true"></i></a>
                    <table>
                        <thead>
                            <tr class="grey-text text-darken-2">
                                <th>Data</th>
                                <th>Descrição</th>
                                <th>Valor Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 8; $i >= 1; $i--)
                                <tr>
                                    <td>XX/XX/XXXX XX:XX</td>
                                    <td>
                                        <span class="chip teal lighten-2 white-text rounded text-muted">Compra 00{{ $i }}</span>
                                        Descrição
                                        <a href="#" class="mt-2 grey-text text-darken-2 hover-link right">Ver mais</a>
                                    </td>
                                    <td>R$ $$,$$</td>
                                </tr>   
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-------------- Estrutura Modais -------------->
    <div id="modalCliente" class="modal modal-fixed-footer modal-fluid">
        <div class="modal-content grey darken-4 p-0 gradient-modal-content">
            <h4 class="cyan darken-2 white-text p-4">
                Cadastro de Cliente
                <a href="#" class="right modal-action modal-close white-text"><i class="fa fa-times fa-xs" aria-hidden="true"></i></a>
            </h4>
            <div class="row m-0">
                <div class="col l12">
                    <form class="col s12" action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="input-field col l4 s12">
                                <input id="name" type="text" name="name" class="validate @error('name') invalid @enderror" value="{{ $cliente->name }}" required autofocus>
                                <label for="name">Nome</label>
                                @error('name')
                                    <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-field col l4 s12">
                                <input id="email" type="email" name="email" class="validate @error('email') invalid @enderror" value="{{ $cliente->email }}" required>
                                <label for="email">E-mail</label>
                                @error('email')
                                    <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-field col l2 s12">
                                <input id="cpf" type="text" name="cpf" class="validate @error('cpf') invalid @enderror" value="{{ $cliente->cpf }}" required>
                                <label for="cpf">CPF</label>
                                @error('cpf')
                                    <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-field col l2 s12 select-light-text white-arrow">
                                <select name="sexo" required>
                                    @php
                                        $sexoSelected = $cliente->sexo;
                                    @endphp
                                    <option value="1" class="{{ $sexoSelected == 1 ? 'selected' : '' }}">Masculino</option>
                                    <option value="2" class="{{ $sexoSelected == 1 ? 'selected' : ''}}">Feminino</option>
                                </select>
                                <label>Sexo</label>
                                @error('sexo')
                                    <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col l3 s6">
                                <input id="password" type="password" name="password" class="validate" required>
                                <label for="password">Senha</label>
                                @error('password')
                                    <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-field col l3 s6">
                                <input id="password_confirmation" type="password" name="password_confirmation" class="validate" required>
                                <label for="password_confirmation">Confirmar Senha</label>
                            </div>
                            <div class="input-field col l3 s12">
                                <input id="nascimento" type="text" name="nascimento" id="nascimento" class="datepicker" value="{{ $cliente->nascimento }}" required>
                                <label for="nascimento">Nascimento</label>
                                @error('nascimento')
                                    <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-field col l3 s12">
                                <input id="telefone" type="tel" name="telefone" class="validate" value="{{ $cliente->telefone }}" required>
                                <label for="telefone">Telefone</label>
                                @error('telefone')
                                    <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col l6 s12">
                                <input id="endereco" type="text" name="endereco" class="validate" value="{{ $cliente->endereco }}" required>
                                <label for="endereco">Endereço</label>
                                @error('endereco')
                                    <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-field col l3 s6">
                                <input id="numero" type="number" name="numero" min="1" class="validate @error('numero') invalid @enderror" value="{{ $cliente->numero }}" required>
                                <label for="numero">Número</label>
                                @error('numero')
                                    <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-field col l3 s6">
                                <input id="complemento" type="text" name="complemento" class="validate" value="{{ $cliente->complemento }}" required>
                                <label for="complemento">Complemento</label>
                                @error('complemento')
                                    <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col l3 s6">
                                <input id="bairro" type="text" name="bairro" class="validate" value="{{ $cliente->bairro }}" required>
                                <label for="bairro">Bairro</label>
                                @error('bairro')
                                    <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-field col l3 s6">
                                <input id="cep" type="text" name="cep" class="validate @error('cep') invalid @enderror" value="{{ $cliente->cep }}" required>
                                <label for="cep">CEP</label>
                                @error('cep')
                                    <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-field col l3 s6">
                                <input id="cidade" type="text" name="cidade" class="validate" value="{{ $cliente->cidade }}"  required>
                                <label for="cidade">Cidade</label>
                                @error('cidade')
                                    <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-field col l3 s6 select-light-text white-arrow">
                                <select name="estado_id" required>
                                    @php
                                        $estados = DB::table('estados')->orderby('uf')->get();
                                    @endphp
                                    <option value="" disabled selected>Escolha o estado</option>
                                    @foreach ($estados as $estado)
                                    @php  $estado->id == $cliente->estado_id ? $ativo = "selected" : $ativo = ""; @endphp
                                        <option value="{{ $estado->id }}" {{ $ativo }}>{{ $estado->uf }}</option>
                                    @endforeach
                                </select>
                                <label>UF</label>
                                @error('estado_id')
                                    <span class="helper-text" data-error="wrong" data-success="right">{{ $message }}</span>
                                @enderror
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

    <div id="modalPets" class="modal modal-fixed-footer modal-fluid">
        <div class="modal-content grey darken-4 p-0 gradient-modal-content">
            <h4 class="cyan darken-2 white-text p-4">
                Adicionar PET
                <a href="#" class="right modal-action modal-close white-text"><i class="fa fa-times fa-xs" aria-hidden="true"></i></a>
            </h4>
            <div class="row m-0 pt-3">
        <form class="col s12" action="{{ route('register') }}" method="POST">
            @csrf
                <div class="col l8 s12">
                    <div class="row">
                        <div class="input-field col l6 s12">
                            <input id="name" type="text" name="name" class="validate @error('name') invalid @enderror" value="{{ $cliente->name }}" required autofocus>
                            <label for="name">Nome</label>
                            @error('name')
                                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-field col l6 s12">
                            <input id="name" type="text" name="name" class="validate @error('name') invalid @enderror" value="{{ $cliente->name }}" required autofocus>
                            <label for="name">Nome</label>
                            @error('name')
                                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col l6 s12">
                            <input id="name" type="text" name="name" class="validate @error('name') invalid @enderror" value="{{ $cliente->name }}" required autofocus>
                            <label for="name">Nome</label>
                            @error('name')
                                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-field col l6 s12">
                            <input id="name" type="text" name="name" class="validate @error('name') invalid @enderror" value="{{ $cliente->name }}" required autofocus>
                            <label for="name">Nome</label>
                            @error('name')
                                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>   
                    <div class="row">
                        <div class="input-field col l4 s12">
                            <input id="name" type="text" name="name" class="validate @error('name') invalid @enderror" value="{{ $cliente->name }}" required autofocus>
                            <label for="name">Nome</label>
                            @error('name')
                                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-field col l4 s12">
                            <input id="name" type="text" name="name" class="validate @error('name') invalid @enderror" value="{{ $cliente->name }}" required autofocus>
                            <label for="name">Nome</label>
                            @error('name')
                                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-field col l4 s12">
                            <input id="name" type="text" name="name" class="validate @error('name') invalid @enderror" value="{{ $cliente->name }}" required autofocus>
                            <label for="name">Nome</label>
                            @error('name')
                                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col l12 s12">
                            <input id="name" type="text" name="name" class="validate @error('name') invalid @enderror" value="{{ $cliente->name }}" required autofocus>
                            <label for="name">Nome</label>
                            @error('name')
                                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col l12 s12">
                            <input id="name" type="text" name="name" class="validate @error('name') invalid @enderror" value="{{ $cliente->name }}" required autofocus>
                            <label for="name">Nome</label>
                            @error('name')
                                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col l3 offset-l1 s12">
                    <label class="white-text">
                        <input name="group1" type="radio" checked />
                        <span>Macho</span>
                    </label>
                    <label class="ml-3 white-text">
                        <input name="group1" type="radio" />
                        <span>Fêmea</span>
                    </label>

                    <p>
                        <label class="white-text">
                            <input type="checkbox" checked/>
                            <span>Vivo</span>
                        </label>
                    </p>
                    <p>
                        <label class="white-text">
                            <input type="checkbox" />
                            <span>Agressivo</span>
                        </label>
                    </p>
                    <p>
                        <label class="white-text">
                            <input type="checkbox" />
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
                    {{-- <input class="btn-floating btn-large waves-effect waves-light teal right" type="file" name="action" /> --}}
                        {{-- <i class="fa fa-camera fa-lg white-text center" aria-hidden="true"></i> --}}
                    
                        
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

    <!-------------- Inicialização Modais -------------->
    <script>
        $(document).ready(function(){
            $('#modalCliente').modal();
            $('#modalPets').modal();
        });
    </script>

    <script>
         $(document).ready(function(){
            $('#tabs-swipe').tabs({
                swipeable: true
            });
        });
    </script>
    <script src="{{ asset('js/configDatepicker.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>

    @endcan
@endsection
