<div class="col l2">
    <ul id="tabs-produtos" class="tabs tabs-vertical">
        <li class="tab col l3 s6"><a class="active" href="#produtoCad">Produtos</a></li>
        <li class="tab col l3 s6"><a href="#marcas">Marcas</a></li>
        <li class="tab col l3 s6"><a href="#tiposProdutos">Tipos</a></li>
    </ul>
</div>
<div class="col l10">
    <div id="produtoCad" class="col s12">
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
            <div class="row">
                <div class="input-field col l3 s12">
                    <input id="name" type="text" name="name" class="validate @error('name') invalid @enderror" required>
                    <label for="name">Nome</label>
                    @error('name')
                        <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col l3 s12">
                    <input id="name" type="text" name="name" class="validate @error('name') invalid @enderror" required>
                    <label for="name">Nome</label>
                    @error('name')
                        <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col l3 s12">
                    <input id="name" type="text" name="name" class="validate @error('name') invalid @enderror" required>
                    <label for="name">Nome</label>
                    @error('name')
                        <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col l3 s12">
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
                <div class="file-field input-field col l6 s12">
                    <div class="btn rounded-circle waves-effect waves-light">
                        <span><i class="fa fa-camera" aria-hidden="true"></i></span>
                        <input type="file">
                    </div>

                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>
            <button class="btn waves-effect waves-light green mb-0 hoverable" type="submit" name="action">Confirmar
                <i class="material-icons right">send</i>
            </button>
            <a href="{{ url('home') }}" class="waves-effect waves-light btn grey mb-0 hoverable">Cancelar</a>
        </form>
    </div>

    <div id="marcas" class="col s12">
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

    <div id="tiposProdutos" class="col s12">
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
