<div class="col l2">
    <ul id="tabs-animais" class="tabs tabs-vertical">
        <li class="tab col l3 s6"><a class="active" href="#especie">Espécie</a></li>
        <li class="tab col l3 s6"><a href="#raca">Raça</a></li>
        <li class="tab col l3 s6"><a href="#porte">Porte</a></li>
        <li class="tab col l3 s6"><a href="#cor">Cor</a></li>
        <li class="tab col l3 s6"><a href="#pelo">Pelo</a></li>
    </ul>
</div>
<div class="col l10">
    <div id="especie" class="col s12">
        <form action="{{ route('especie.store') }}" method="POST">
            {{ csrf_field() }}

            <div class="row">
                <div class="input-field col l12 s12">
                    <input id="especieNome" type="text" name="nome" class="validate @error('nome') invalid @enderror" required>
                    <label for="nome">Nome</label>
                    @error('nome')
                        <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button class="btn waves-effect waves-light green mb-0 hoverable" type="submit" name="action">Confirmar
                <i class="material-icons right">send</i>
            </button>
            <a href="{{ route('dashboard') }}" class="waves-effect waves-light btn grey mb-0 hoverable">Cancelar</a>
        </form>
    </div>
    <div id="raca" class="col s12">
        <form action="{{ route('raca.store') }}" method="POST">
            {{ csrf_field() }}

            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="racaNome" type="text" name="nome" class="validate @error('name') invalid @enderror" required>
                    <label for="nome">Nome</label>
                    @error('nome')
                        <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col l6 s12 select-light-text white-arrow">
                    <select name="especie_id" required>
                        <option value="" disabled selected>Escolha a espécie</option>
                        @foreach ($especies as $especie)
                            <option value="{{ $especie->id }}">{{ $especie->nome }}</option>
                        @endforeach
                    </select>
                    <label>Espécie</label>
                    @error('estado_id')
                        <span class="helper-text" data-error="wrong" data-success="right">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button class="btn waves-effect waves-light green mb-0 hoverable" type="submit" name="action">Confirmar
                <i class="material-icons right">send</i>
            </button>
            <a href="{{ route('dashboard') }}" class="waves-effect waves-light btn grey mb-0 hoverable">Cancelar</a>
        </form>
    </div>
    <div id="porte" class="col s12">
        <form action="{{ route('porte.store') }}" method="POST">
            {{ csrf_field() }}

            <div class="row">
                <div class="input-field col l12 s12">
                    <input id="descricao" type="text" name="descricao" class="validate @error('descricao') invalid @enderror" required>
                    <label for="descricao">Descrição</label>
                    @error('descricao')
                        <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button class="btn waves-effect waves-light green mb-0 hoverable" type="submit" name="action">Confirmar
                <i class="material-icons right">send</i>
            </button>
            <a href="{{ route('dashboard') }}" class="waves-effect waves-light btn grey mb-0 hoverable">Cancelar</a>
        </form>
    </div>
    <div id="cor" class="col s12">
        <form action="{{ route('cor.store') }}" method="POST">
            {{ csrf_field() }}

            <div class="row">
                <div class="input-field col l12 s12">
                    <input id="descricao" type="text" name="descricao" class="validate @error('descricao') invalid @enderror" required>
                    <label for="descricao">Descrição</label>
                    @error('descricao')
                        <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button class="btn waves-effect waves-light green mb-0 hoverable" type="submit" name="action">Confirmar
                <i class="material-icons right">send</i>
            </button>
            <a href="{{ route('dashboard') }}" class="waves-effect waves-light btn grey mb-0 hoverable">Cancelar</a>
        </form>
    </div>
    <div id="pelo" class="col s12">
        <form action="{{ route('pelo.store') }}" method="POST">
            {{ csrf_field() }}

            <div class="row">
                <div class="input-field col l12 s12">
                    <input id="descricao" type="text" name="descricao" class="validate @error('descricao') invalid @enderror" required>
                    <label for="descricao">Descrição</label>
                    @error('descricao')
                        <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button class="btn waves-effect waves-light green mb-0 hoverable" type="submit" name="action">Confirmar
                <i class="material-icons right">send</i>
            </button>
            <a href="{{ route('dashboard') }}" class="waves-effect waves-light btn grey mb-0 hoverable">Cancelar</a>
        </form>
    </div>
</div>
