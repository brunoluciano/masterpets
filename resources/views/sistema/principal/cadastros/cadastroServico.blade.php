<div class="col l2">
    <ul id="tabs-servicos" class="tabs tabs-vertical">
        <li class="tab col l3 s6"><a class="active" href="#servicoCad">Serviços</a></li>
        <li class="tab col l3 s6"><a href="#tiposServicos">Tipos</a></li>
    </ul>
</div>
<div class="col l10">
    <div id="servicoCad" class="col s12">
        <form action="#">
            <div class="row">
                <div class="input-field col l12 s12">
                    <input id="name" type="text" name="name" class="validate @error('name') invalid @enderror" required>
                    <label for="name">Nome</label>
                    @error('name')
                        <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="name" type="text" name="name" class="validate @error('name') invalid @enderror" required>
                    <label for="name">Nome</label>
                    @error('name')
                        <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col l6 s12">
                    <input id="name" type="text" name="name" class="validate @error('name') invalid @enderror" required>
                    <label for="name">Nome</label>
                    @error('name')
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
        <form action="#">
            <div class="row">
                <div class="input-field col l12 s12">
                    <input id="name" type="text" name="name" class="validate @error('name') invalid @enderror" required>
                    <label for="name">Nome</label>
                    @error('name')
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
