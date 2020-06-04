<label class="white-text">
    <input name="group1" type="radio" checked />
    <span>Cliente</span>
</label>
<label class="white-text ml-3">
    <input name="group1" type="radio" />
    <span>Funcionário</span>
</label>
<label class="white-text ml-3">
    <input name="group1" type="radio" />
    <span>Gerente</span>
</label>
<hr class="my-4 divider">
<form class="col s12" action="{{ route('register') }}" method="POST">
    @csrf

    <div class="row">
        <div class="input-field col l4 s12">
            <input id="name" type="text" name="name" class="validate @error('name') invalid @enderror" required>
            <label for="name">Nome</label>
            @error('name')
                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-field col l4 s12">
            <input id="email" type="email" name="email" class="validate @error('email') invalid @enderror" required>
            <label for="email">E-mail</label>
            @error('email')
                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-field col l2 s12">
            <input id="cpf" type="text" name="cpf" class="validate @error('cpf') invalid @enderror" required>
            <label for="cpf">CPF</label>
            @error('cpf')
                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-field col l2 s12 select-light-text white-arrow">
            <select name="sexo" required>
                <option value="1">Masculino</option>
                <option value="2">Feminino</option>
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
            <input id="nascimento" type="text" name="nascimento" id="nascimento" class="datepicker" required>
            <label for="nascimento">Nascimento</label>
            @error('nascimento')
                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-field col l3 s12">
            <input id="telefone" type="tel" name="telefone" class="validate" required>
            <label for="telefone">Telefone</label>
            @error('telefone')
                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="input-field col l6 s12">
            <input id="endereco" type="text" name="endereco" class="validate" required>
            <label for="endereco">Endereço</label>
            @error('endereco')
                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-field col l3 s6">
            <input id="numero" type="number" name="numero" min="1" class="validate @error('numero') invalid @enderror" required>
            <label for="numero">Número</label>
            @error('numero')
                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-field col l3 s6">
            <input id="complemento" type="text" name="complemento" class="validate" required>
            <label for="complemento">Complemento</label>
            @error('complemento')
                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="input-field col l3 s6">
            <input id="bairro" type="text" name="bairro" class="validate" required>
            <label for="bairro">Bairro</label>
            @error('bairro')
                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-field col l3 s6">
            <input id="cep" type="text" name="cep" class="validate @error('cep') invalid @enderror" required>
            <label for="cep">CEP</label>
            @error('cep')
                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-field col l3 s6">
            <input id="cidade" type="text" name="cidade" class="validate" required>
            <label for="cidade">Cidade</label>
            @error('cidade')
                <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
            @enderror
        </div>
        <div class="input-field col l3 s6 select-light-text white-arrow">
            <select name="estado_id" required>
                <option value="" disabled selected>Escolha o estado</option>
                @foreach ($estados as $estado)
                    @php
                        $estado->uf == "SP" ? $ativo = "selected" : $ativo = "";
                    @endphp
                    <option value="{{ $estado->id }}" {{ $ativo }}>{{ $estado->uf }}</option>
                @endforeach
            </select>
            <label>UF</label>
            @error('estado_id')
                <span class="helper-text" data-error="wrong" data-success="right">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <button class="btn waves-effect waves-light green mb-0 hoverable" type="submit" name="action">Confirmar
        <i class="material-icons right">send</i>
    </button>
    <a href="{{ url('home') }}" class="waves-effect waves-light btn grey mb-0 hoverable">Cancelar</a>
</form>
