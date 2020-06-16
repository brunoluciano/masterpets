<div class="col l2">
    <ul id="tabs-produtos" class="tabs tabs-vertical">
        <li class="tab col l3 s6"><a class="active" href="#produtoCad">Produtos</a></li>
        <li class="tab col l3 s6"><a href="#marcas">Marcas</a></li>
        <li class="tab col l3 s6"><a href="#tiposProdutos">Tipos</a></li>
    </ul>
</div>
<div class="col l10">
    <div id="produtoCad" class="col s12">
        <form action="{{ route('produto.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row">
                <div class="input-field col l6 s12">
                    <input id="descricao" type="text" name="descricao" class="validate @error('descricao') invalid @enderror" required>
                    <label for="descricao">Descrição</label>
                    @error('descricao')
                        <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col l6 s12 select-light-text white-arrow">
                    <select name="tipo_id" required>
                        <option value="" disabled selected>Escolha a tipo do produto</option>
                        @foreach ($tipoprodutos as $tipoproduto)
                            <option value="{{ $tipoproduto->id }}">{{ $tipoproduto->descricao }}</option>
                        @endforeach
                    </select>
                    <label>Tipo do Produto</label>
                    @error('tipo_id')
                        <span class="helper-text" data-error="wrong" data-success="right">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col l6 s12">
                    <input type="text" id="marca" class="autocomplete" name="marca" autocomplete="off" >
                    <input type="hidden" id="marca_id" name="marca_id" >
                    <label for="autocomplete-input">Marca</label>
                    @error('marca')
                        <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col l3 s12">
                    <input id="unidade" type="number" min="0" name="unidade" class="validate @error('unidade') invalid @enderror" required>
                    <label for="unidade">Unidade</label>
                    @error('unidade')
                        <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col l3 s12 select-light-text white-arrow">
                    <select name="unidade_medida_id" required>
                        <option value="" disabled selected>Escolha a unidade</option>
                        @foreach ($unidademedidas as $unidademedida)
                            <option value="{{ $unidademedida->id }}">{{ $unidademedida->descricao . " (" . $unidademedida->abreviacao . ")" }}</option>
                        @endforeach
                    </select>
                    <label>Unidade de Medida</label>
                    @error('unidade_medida_id')
                        <span class="helper-text" data-error="wrong" data-success="right">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col l3 s12">
                    <input id="cod_barras" type="text" name="cod_barras" class="validate @error('cod_barras') invalid @enderror">
                    <i class="fas fa-barcode fa-xs prefix right white-text" aria-hidden="true"></i>
                    <label for="cod_barras">Código de Barras</label>
                    @error('cod_barras')
                        <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col l3 s12">
                    <input id="estoque_minimo" type="number" name="estoque_minimo" class="validate no-arrows @error('estoque_minimo') invalid @enderror" required>
                    <i class="fas fa-dollar-sign fa-xs prefix right white-text" aria-hidden="true"></i>
                    <label for="estoque_minimo">Estoque Mínimo</label>
                    @error('estoque_minimo')
                        <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col l3 s12">
                    <input id="estoque_maximo" type="number" name="estoque_maximo" class="validate no-arrows @error('estoque_maximo') invalid @enderror" required>
                    <i class="fas fa-dollar-sign fa-xs prefix right white-text" aria-hidden="true"></i>
                    <label for="estoque_maximo">Estoque Máximo</label>
                    @error('estoque_maximo')
                        <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col l3 s12">
                    <input id="estoque_atual" type="number" name="estoque_atual" class="validate no-arrows @error('estoque_atual') invalid @enderror" required>
                    <i class="fas fa-dollar-sign fa-xs prefix right white-text" aria-hidden="true"></i>
                    <label for="estoque_atual">Estoque Atual</label>
                    @error('estoque_atual')
                        <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col l4 s12">
                    <input id="preco_compra" type="number" name="preco_compra" step="0.01" class="validate @error('preco_compra') invalid @enderror" required>
                    <i class="fas fa-dolly fa-xs prefix right white-text" aria-hidden="true"></i>
                    <label for="preco_compra">Preço de Compra</label>
                    @error('preco_compra')
                        <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field col l4 s12">
                    <input id="preco_venda" type="number" name="preco_venda" step="0.01" class="validate @error('preco_venda') invalid @enderror" required>
                    <i class="fas fa-donate fa-xs prefix right white-text" aria-hidden="true"></i>
                    <label for="preco_venda">Preço de Venda</label>
                    @error('preco_venda')
                        <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                    @enderror
                </div>
                <div class="file-field input-field col l4 s12">
                    <div class="btn rounded-circle waves-effect waves-light">
                        <span><i class="fa fa-camera" aria-hidden="true"></i></span>
                        <input type="file" name="imgProduto">
                    </div>
                    <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Imagem do Produto">
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
        <form action="{{ route('marca.store') }}" method="POST">
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

    <div id="tiposProdutos" class="col s12">
        <form action="{{ route('tipoproduto.store') }}" method="POST">
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

<script>
    $(document).ready(function(){
        $.ajax({
            type: 'get',
            url: '{!! URL::to('dashboard/cadastros/produto/findMarcas') !!}',
            success:function(response){
                console.log(response);
                // converter array para object
                var marArray = response;
                var dataMar = {};
                var dataMar2 = {};
                for (var i = 0; i < marArray.length; i++) {
                    dataMar[marArray[i].descricao] = null;
                    dataMar2[marArray[i].descricao] = marArray[i];
                }
                console.log(dataMar2);

                // materialize css
                $('input#marca').autocomplete({
                    data: dataMar,
                    onAutocomplete:function(reqdata){
                        console.log(dataMar2[reqdata])
                        $('input#marca_id').val(dataMar2[reqdata]['id']);
                    }
                });
            }
        })
    });
</script>
