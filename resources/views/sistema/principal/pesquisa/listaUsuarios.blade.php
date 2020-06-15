<div class="row valign-wrapper my-0">
    <div class="col l6 s12">
        <label class="white-text">
            <input name="tipo_usuario_id" type="radio" value="1" />
            <span>Cliente</span>
        </label>
        <label class="white-text ml-3">
            <input name="tipo_usuario_id" type="radio" value="2" />
            <span>Funcionário</span>
        </label>
        <label class="white-text ml-3">
            <input name="tipo_usuario_id" type="radio" value="3" />
            <span>Gerente</span>
        </label>
    </div>
    <div class="col l3 offset-l3 s12">
        <div class="input-field">
            <input type="text" id="input_usuario" onkeyup="buscaUsuario()">
            <i class="fas fa-search fa-xs prefix right white-text"></i>
            <label for="autocomplete-input">Buscar por usuário</label>
        </div>
    </div>
</div>
<hr class="my-0 divider">
<table id="table_usuario" class="striped centered blue-grey darken-2 white-text hoverable text-shadow table-overflow-pesquisa">
    <thead class="cyan darken-3">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Tipo de Usuário</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->cpf }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->telefone }}</td>
                <td>{{ $usuario->tipo_usuario->descricao }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div id="alertaSemUsuario" class="row yellow lighten-2 rounded z-depth-2" style="display: none;">
    <h5 class="center py-2">Nenhum usuário encontrado <i class="fas fa-exclamation-triangle"></i></h5>
</div>
<br>

<script>
    function buscaUsuario() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue, cont;
        input = document.getElementById("input_usuario");
        filter = input.value.toUpperCase();
        table = document.getElementById("table_usuario");
        tr = table.getElementsByTagName("tr");
        alerta = document.getElementById("alertaSemUsuario");
        cont = 0;

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
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



