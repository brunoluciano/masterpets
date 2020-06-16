<div class="col l2">
    <ul id="tabs-funcionarios" class="tabs tabs-vertical">
        <li class="tab col l3 s6"><a class="active" href="#funcionariosVendas">Vendas</a></li>
    </ul>
</div>
<div class="col l10">
    <div id="funcionariosVendas" class="col s12">
        <form action="{{ route('relatorio.funcionarios.vendas') }}" method="GET" target="_blank">
            <div class="row mb-0">
                <label class="white-text col l3 mt-4">
                    <input name="porperiodo" type="checkbox" value="1" />
                    <span>Imprimir por período</span>
                </label>
                <div class="input-field col l3 pb-4">
                    <input id="desde" type="text" name="desde" id="desde" class="datepicker">
                    <label for="desde">Desde</label>
                </div>
                <div class="input-field col l3">
                    <input id="ate" type="text" name="ate" id="ate" class="datepicker">
                    <label for="ate">Até</label>
                </div>
            </div>
            <div class="row mt-0">
                <button class="btn waves-effect waves-light orange" type="submit" name="action">
                    <i class="fas fa-print"></i> Gerar Relatório • Vendas realizadas
                </button>
            </div>
        </form>
    </div>
</div>
