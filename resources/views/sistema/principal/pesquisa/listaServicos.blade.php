<div class="row my-0">
    <div class="col l3 s12">
        <div class="input-field">
            <input type="text" id="input_servico" onkeyup="buscaServico()">
            <i class="fas fa-search fa-xs prefix right white-text"></i>
            <label for="autocomplete-input">Buscar por serviço</label>
        </div>
    </div>
</div>
<hr class="my-0 divider">
<table id="table_servico" class="striped centered blue-grey darken-2 white-text hoverable text-shadow table-overflow-pesquisa">
    <thead class="cyan darken-3">
        <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Tipo do serviço</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($servicos as $servico)
            @php
                $valor = number_format($servico->valor,2,',','.');
            @endphp

            <tr>
                <td>{{ $servico->id }}</td>
                <td>{{ $servico->descricao }}</td>
                <td>{{ $servico->tipo_servico->descricao }}</td>
                <td>R$ {{ $valor }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div id="alertaSemServico" class="row yellow lighten-2 rounded z-depth-2" style="display: none;">
    <h5 class="center py-2">Nenhum serviço encontrado <i class="fas fa-exclamation-triangle"></i></h5>
</div>
<br><br>

<script>
    function buscaServico() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue, cont;
        input = document.getElementById("input_servico");
        filter = input.value.toUpperCase();
        table = document.getElementById("table_servico");
        tr = table.getElementsByTagName("tr");
        alerta = document.getElementById("alertaSemServico");
        cont = 0;

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    //
                } else {
                    cont = cont + 1;
                    tr[i].style.display = "none";
                }
            }
        }
        if (cont == tr.length - 1){
            alerta.style.display = "";
            table.style.display = "none";
        } else {
            alerta.style.display = "none";
            table.style.display = "";
        }
    }
</script>
