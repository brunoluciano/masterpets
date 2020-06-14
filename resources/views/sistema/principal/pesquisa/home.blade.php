@extends('layouts.sistema')

@section('content')
@php
    $path = "sistema.principal.pesquisa.";
@endphp
<div class="container-fluid py-4">
    @if ($message = Session::get('success'))
        <script>
            toastr.options = {
                "positionClass": "toast-top-full-width",
                "showDuration": "300",
                "hideDuration": "1000"
            }
            Command: toastr["success"]("{{ $message }}")
        </script>
    @endif
    <div class="row">
        <h2 class="my-0 ml-3 grey-text text-darken-2">Pesquisa <i class="fas fa-search"></i></h2>
        <div class="col l12 s12 fix-tabs-content">
            <ul id="tabs-main" class="tabs">
                <li class="tab col l3 s6"><a class="active" href="#usuarios">Usuários</a></li>
                <li class="tab col l3 s6"><a href="#pets">PETs</a></li>
                <li class="tab col l3 s6"><a href="#produtos">Produtos</a></li>
                <li class="tab col l3 s6"><a href="#servicos">Serviços</a></li>
            </ul>
            <div id="usuarios" class="col l12 s12 gradient-tab-content">
                <div class="row px-4 pt-0 pb-4 mb-0 gradient-modal-content">
                    @include($path.'listaUsuarios')
                </div>
            </div>
            <div id="pets" class="col l12 s12 gradient-modal-content">
                <div class="row px-4 pt-0 pb-4 mb-0">
                    @include($path.'listaPets')
                </div>
            </div>
            <div id="produtos" class="col l12 s12 gradient-modal-content">
                <div class="row px-4 pt-0 pb-4 mb-0">
                    @include($path.'listaProdutos')
                </div>
            </div>
            <div id="servicos" class="col l12 s12 gradient-modal-content">
                <div class="row px-4 pt-0 pb-4 mb-0">
                    @include($path.'listaServicos')
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
       $('ul#tabs-main').tabs({
           swipeable: true
       });
       $('ul#tabs-usuarios').tabs();
       $('ul#tabs-pets').tabs();
       $('ul#tabs-produtos').tabs();
       $('ul#tabs-servicos').tabs();
   });
</script>
@stop
