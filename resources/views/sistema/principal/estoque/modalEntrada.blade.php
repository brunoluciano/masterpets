<div id="modalEntrada" class="modal">
    <div class="modal-content grey darken-4 p-0 gradient-modal-content">
        <h4 class="cyan darken-2 white-text p-4">
            Nova Entrada de Produto
            <a href="#" class="right modal-action modal-close white-text"><i class="fa fa-times fa-xs" aria-hidden="true"></i></a>
        </h4>
    <form id="formNovaEntrada" method="POST" class="col s12">
        @csrf
        @method('PUT')

        <div class="row m-0 p-3">
            <div class="col l12 s12">
                <div class="row">
                    <div class="input-field col l12 s12">
                        <input type="text" id="produto" class="autocomplete" name="produto" autocomplete="off" required>
                        <input type="hidden" id="produto_id" name="produto_id" required>
                        <label for="autocomplete-input">Produto</label>
                        @error('produto')
                            <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col l4 s12">
                        <input type="number" min="1" id="estoque_minimo" class="validate" name="estoque_minimo" autocomplete="off" required>
                        <label id="estoqueminimoLabel" for="autocomplete-input">Estoque Mínimo</label>
                        @error('estoque_minimo')
                            <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-field col l4 s12">
                        <input type="number" min="1" id="estoque_maximo" class="validate" name="estoque_maximo" autocomplete="off" required>
                        <label id="estoquemaximoLabel" for="autocomplete-input">Estoque Máximo</label>
                        @error('estoque_maximo')
                            <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="input-field col l4 s12">
                        <input type="number" min="1" id="estoque_atual" class="validate" name="estoque_atual" autocomplete="off" required>
                        <label id="estoqueatualLabel" for="autocomplete-input">Estoque Atual</label>
                        @error('estoque_atual')
                            <span class="helper-text" data-error="{{ $message }}" data-success="Correto!">{{ $message }}</span>
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
<script>
    $(document).ready(function(){
        $('#modalEntrada').modal();
    });
</script>
<script>
    $(document).ready(function(){
        $.ajax({
            type: 'get',
            url: '{!! URL::to('dashboard/estoque/findProdutos') !!}',
            success:function(response){
                // converter array para object
                var proArray = response;
                var dataPro = {};
                var dataPro2 = {};
                for (var i = 0; i < proArray.length; i++) {
                    dataPro[proArray[i].descricao] = '{{ env("APP_URL") }}/storage/'+proArray[i].path_img;;
                    dataPro2[proArray[i].descricao] = proArray[i];
                }

                // materialize css
                $('input#produto').autocomplete({
                    data: dataPro,
                    onAutocomplete:function(reqdata){
                        console.log(dataPro2[reqdata])
                        $('input#produto_id').val(dataPro2[reqdata]['id']);
                        $('input#estoque_minimo').val(dataPro2[reqdata]['estoque_minimo']);
                        $('input#estoque_maximo').val(dataPro2[reqdata]['estoque_maximo']);
                        $('input#estoque_atual').val(dataPro2[reqdata]['estoque_atual']);

                        $('input#estoque_atual').attr('max', dataPro2[reqdata]['estoque_maximo']);

                        $('label#estoqueminimoLabel').addClass('active');
                        $('label#estoquemaximoLabel').addClass('active');
                        $('label#estoqueatualLabel').addClass('active');


                        var maximo_cliente = $('input#estoque_maximo').val(dataPro2[reqdata]['estoque_maximo']);
                        $('input#estoque_maximo').on('keyup',function(e){
                            var novo_maximo = $(this).val();
                            if(novo_maximo != maximo_cliente){
                                $('input#estoque_atual').attr('max', novo_maximo);
                            }
                            maximo_cliente = novo_maximo
                        });

                        $('input#estoque_maximo').click(function(){
                            var novo_maximo = $('input#estoque_maximo').val();
                            $('input#estoque_atual').attr('max', novo_maximo);
                        });

                        // função para concatenar variável com string
                        function parse(str) {
                            var args = [].slice.call(arguments, 1),
                                i = 0;
                            return str.replace(/%s/g, () => args[i++]);
                        }

                        var product_id = {};
                        produto_id = dataPro2[reqdata]['id'];
                        var url = parse('{{ route("entrada.produto.update", "%s") }}',produto_id);
                        $('#formNovaEntrada').attr('action', url);
                    }
                });
            }
        })
    });
</script>
