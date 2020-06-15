<div class="col l2">
    <ul id="tabs-clientes" class="tabs tabs-vertical">
        <li class="tab col l3 s6"><a class="active" href="#clientesCompras">Compras</a></li>
        <li class="tab col l3 s6"><a href="#clientesConsultas">Consultas</a></li>
        <li class="tab col l3 s6"><a href="#clientesAssiduidade">Assiduidade</a></li>
    </ul>
</div>
<div class="col l10">
    <div id="clientesCompras" class="col s12">
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
            <a href="{{ route('relatorio.clientes.compras') }}" class="waves-effect waves-light btn orange" target="_blank">
                <i class="fas fa-print"></i> Gerar Relatório • Compras
            </a>
        </div>
    </div>

    <div id="clientesConsultas" class="col s12">
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
        <div class="row">
            <a href="{{ route('relatorio.clientes.consultas') }}" class="waves-effect waves-light btn orange" target="_blank">
                <i class="fas fa-print"></i> Gerar Relatório • Consultas
            </a>
        </div>
    </div>

    <div id="clientesAssiduidade" class="col s12">
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
        <div class="row">
            <a href="{{ route('relatorio.clientes.assiduidade') }}" class="waves-effect waves-light btn orange" target="_blank">
                <i class="fas fa-print"></i> Gerar Relatório • Assiduidade
            </a>
        </div>
    </div>
</div>
