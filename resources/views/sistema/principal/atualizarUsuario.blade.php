<div id="modalUsuario" class="modal modal-fixed-footer modal-fluid">
    <div class="modal-content grey darken-4 p-0 gradient-modal-content">
        <h4 class="cyan darken-2 white-text p-4">
            Atualizar Usuário
            <a href="#" class="right modal-action modal-close white-text"><i class="fa fa-times fa-xs" aria-hidden="true"></i></a>
        </h4>
        <div class="row m-0">
            <div class="col l12">
                <form class="col s12" action="{{ route('cliente.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="input-field col l4 s12">
                            <input id="name" type="text" name="name" class="validate @error('name') invalid @enderror" value="{{ $user->name }}" required autofocus>
                            <label for="name">Nome</label>
                            @error('name')
                                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-field col l4 s12">
                            <input id="email" type="email" name="email" class="validate @error('email') invalid @enderror" value="{{ $user->email }}" required>
                            <label for="email">E-mail</label>
                            @error('email')
                                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                            @enderror
                        </div>
                        <input id="password" type="hidden" name="password" value="{{ $user->password }}">
                        <div class="input-field col l2 s12">
                            <input id="cpf" type="text" name="cpf" class="validate @error('cpf') invalid @enderror" value="{{ $user->cpf }}" required>
                            <label for="cpf">CPF</label>
                            @error('cpf')
                                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-field col l2 s12 select-light-text white-arrow">
                            <select name="sexo" required>
                                @php
                                    $sexoSelected = $user->sexo;
                                @endphp
                                <option value="1" {{ $sexoSelected == 1 ? 'selected' : '' }}>Masculino</option>
                                <option value="2" {{ $sexoSelected == 2 ? 'selected' : ''}}>Feminino</option>
                            </select>
                            <label>Sexo</label>
                            @error('sexo')
                                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col l3 s12">
                            <input id="nascimentoCliente" type="text" name="nascimento" id="nascimento" class="datepicker" value="{{ $user->nascimento }}" required>
                            <label for="nascimento">Nascimento</label>
                            <i class="fas fa-calendar-alt fa-xs prefix right white-text" aria-hidden="true"></i>
                            @error('nascimento')
                                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-field col l3 s12">
                            <input id="telefone" type="tel" name="telefone" class="validate" value="{{ $user->telefone }}" required>
                            <label for="telefone">Telefone</label>
                            @error('telefone')
                                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-field col l4 s12">
                            <input id="endereco" type="text" name="endereco" class="validate" value="{{ $user->endereco }}" required>
                            <label for="endereco">Endereço</label>
                            @error('endereco')
                                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-field col l2 s6">
                            <input id="numero" type="number" name="numero" min="1" class="validate @error('numero') invalid @enderror" value="{{ $user->numero }}" required>
                            <label for="numero">Número</label>
                            @error('numero')
                                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col l2 s6">
                            <input id="complemento" type="text" name="complemento" class="validate" value="{{ $user->complemento }}" required>
                            <label for="complemento">Complemento</label>
                            @error('complemento')
                                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-field col l2 s6">
                            <input id="bairro" type="text" name="bairro" class="validate" value="{{ $user->bairro }}" required>
                            <label for="bairro">Bairro</label>
                            @error('bairro')
                                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-field col l2 s6">
                            <input id="cep" type="text" name="cep" class="validate @error('cep') invalid @enderror" value="{{ $user->cep }}" required>
                            <label for="cep">CEP</label>
                            @error('cep')
                                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="input-field col l3 s6">
                            <input id="cidade" type="text" name="cidade" class="validate" value="{{ $user->cidade }}"  required>
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
                                @php  $estado->id == $user->estado_id ? $ativo = "selected" : $ativo = ""; @endphp
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


