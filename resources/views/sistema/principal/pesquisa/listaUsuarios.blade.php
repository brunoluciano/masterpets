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
            <input type="text" id="autocomplete-input" class="autocomplete">
            <i class="fas fa-search fa-xs prefix right white-text"></i>
            <label for="autocomplete-input">Buscar por usuário</label>
        </div>
    </div>
</div>
<hr class="my-0 divider">
<table class="striped centered white-text hoverable text-shadow table-overflow-pesquisa">
    <thead>
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
<br>



