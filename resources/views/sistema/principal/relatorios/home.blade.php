@extends('layouts.sistema')

@section('content')
@php
    $path = "sistema.principal.relatorios.";
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
        <h2 class="my-0 ml-3 grey-text text-darken-2">Relatórios <i class="fas fa-clipboard-list"></i></h2>
        <div class="col l12 s12 fix-tabs-content">
            <ul id="tabs-main" class="tabs">
                <li class="tab col l2 s6"><a class="active" href="#clientes">Clientes</a></li>
                <li class="tab col l2 s6"><a href="#funcionarios">Funcionários</a></li>
                <li class="tab col l2 s6"><a href="#animais">Animais</a></li>
                <li class="tab col l2 s6"><a href="#financeiro">Financeiro</a></li>
                <li class="tab col l2 s6"><a href="#estoque">Estoque</a></li>
            </ul>
            <div id="clientes" class="col l12 s12 gradient-modal-content">
                <div class="row p-4 mb-0">
                    @include($path.'relatorioClientes')
                </div>
            </div>
            <div id="funcionarios" class="col l12 s12 gradient-modal-content">
                <div class="row pt-2 py-4 mb-0">
                    @include($path.'relatorioFuncionarios')
                </div>
            </div>
            <div id="animais" class="col l12 s12 gradient-modal-content">
                <div class="row pt-2 mb-0">
                    @include($path.'relatorioAnimais')
                </div>
            </div>
            <div id="financeiro" class="col l12 s12 gradient-modal-content">
                <div class="row pt-2 mb-0">
                    @include($path.'relatorioFinanceiro')
                </div>
            </div>
            <div id="estoque" class="col l12 s12 gradient-modal-content">
                <div class="row pt-2 mb-0">
                    @include($path.'relatorioEstoque')
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
       $('ul#tabs-clientes').tabs();
       $('ul#tabs-funcionarios').tabs();
       $('ul#tabs-animais').tabs();
       $('ul#tabs-financeiro').tabs();
       $('ul#tabs-estoque').tabs();
   });
</script>
<script src="{{ asset('js/configDatepicker.js')}}"></script>
<script>
    $(document).ready(function(){
        $('select').formSelect();
    });
</script>
@stop
