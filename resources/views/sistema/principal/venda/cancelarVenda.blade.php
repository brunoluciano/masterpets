<div id="cancelarVenda" class="modal">
    <div class="modal-content grey darken-4 p-0 gradient-modal-content">
        <h4 class="cyan darken-2 white-text p-4">
            Cancelar Venda
            <a href="#" class="right modal-action modal-close white-text"><i class="fa fa-times fa-xs" aria-hidden="true"></i></a>
        </h4>
        <div class="row white-text center-align mb-0 py-4">
            <h6 class="my-0">Você tem certeza que deseja cancelar a venda? Todos os itens do carrinho serão removidos!</h6>
        </div>
    </div>
    <div class="modal-footer cyan darken-4 pr-4">
        <a href="{{ route('cancelar.venda') }}" class="waves-effect waves-light btn red mb-0 hoverable">Sim <i class="fa fa-trash"></i></a>
        <a href="#" class="waves-effect waves-light btn grey mb-0 hoverable modal-action modal-close">Não</a>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#cancelarVenda').modal();
    });
</script>
