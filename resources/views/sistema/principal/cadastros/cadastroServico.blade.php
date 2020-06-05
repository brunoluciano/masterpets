<div class="col l2">
    <ul id="tabs-servicos" class="tabs tabs-vertical">
        <li class="tab col l3 s6"><a class="active" href="#servicoCad">Serviços</a></li>
        <li class="tab col l3 s6"><a href="#tiposServicos">Tipos</a></li>
    </ul>
</div>
<div class="col l10">
    <div id="servicoCad" class="col s12">
        <form action="{{ route('servico.store') }}" method="POST">
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
            <div class="row">
                <div class="input-field col l6 s12 select-light-text white-arrow">
                    <select name="tipo_servico_id" required>
                        <option value="" disabled selected>Escolha o tipo do serviço</option>
                        @foreach ($tiposervicos as $tiposervico)
                            <option value="{{ $tiposervico->id }}">{{ $tiposervico->descricao }}</option>
                        @endforeach
                    </select>
                    <label>Tipo do Serviço</label>
                    @error('tipo_servico_id')
                        <span class="helper-text" data-error="wrong" data-success="right">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col l6 s12">
                    <input id="valor" type="number" name="valor" class="validate @error('name') invalid @enderror" min="1" step="0.01" required>
                    <label for="valor">Valor</label>
                    @error('valor')
                        <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button class="btn waves-effect waves-light green mb-0 hoverable" type="submit" name="action">Confirmar
                <i class="material-icons right">send</i>
            </button>
            <a href="{{ url('home') }}" class="waves-effect waves-light btn grey mb-0 hoverable">Cancelar</a>
        </form>
    </div>
    <div id="tiposServicos" class="col s12">
        <form action="{{ route('tiposervico.store') }}" method="POST">
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
            <a href="{{ url('home') }}" class="waves-effect waves-light btn grey mb-0 hoverable">Cancelar</a>
        </form>
    </div>
</div>
