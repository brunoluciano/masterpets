<div class="col l2">
    <ul id="tabs-estoque" class="tabs tabs-vertical">
        <li class="tab col l3 s6"><a class="active" href="#estoqueProdutos">Produtos</a></li>
        <li class="tab col l3 s6"><a href="#estoqueFalta">Em Falta</a></li>
        <li class="tab col l3 s6"><a href="#estoqueLancamentos">Novos Lançamentos</a></li>
    </ul>
</div>
<div class="col l10">
    <div id="estoqueProdutos" class="col s12">
        <form action="{{ route('relatorio.estoque.produtos') }}" method="GET" target="_blank">
            <div class="row">
                <button class="btn waves-effect waves-light orange" type="submit" name="action">
                    <i class="fas fa-print"></i> Gerar Relatório • Produtos armazenados no estoque
                </button>
            </div>
        </form>
    </div>

    <div id="estoqueFalta" class="col s12">
        <form action="{{ route('relatorio.estoque.falta') }}" method="GET" target="_blank">
            <div class="row">
                <button class="btn waves-effect waves-light orange" type="submit" name="action">
                    <i class="fas fa-print"></i> Gerar Relatório • Produtos em Falta
                </button>
            </div>
        </form>
    </div>

    <div id="estoqueLancamentos" class="col s12">
        <form action="{{ route('relatorio.estoque.lancamentos') }}" method="GET" target="_blank">
            <div class="row">
                <button class="btn waves-effect waves-light orange" type="submit" name="action">
                    <i class="fas fa-print"></i> Gerar Relatório • Últimos produtos lançados
                </button>
            </div>
        </form>
    </div>
</div>
