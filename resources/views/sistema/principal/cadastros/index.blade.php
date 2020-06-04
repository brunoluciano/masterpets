@extends('layouts.sistema')

@section('title', '| Cadastros')

@section('content')
@php
    $path = "sistema.principal.cadastros.";
@endphp
<div class="container py-4">
    @if ($message = Session::get('success'))
        <div class="green">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <br>
        <div class="col l12 s12 fix-tabs-content">
            <ul id="tabs-main" class="tabs">
                <li class="tab col l3 s6"><a class="active" href="#usuarios">Usuários</a></li>
                <li class="tab col l3 s6"><a href="#produtos">Produtos</a></li>
                <li class="tab col l3 s6"><a href="#animais">Animais</a></li>
                <li class="tab col l3 s6"><a href="#servicos">Serviços</a></li>
            </ul>
            <div id="usuarios" class="col l12 s12 gradient-tab-content">
                <div class="row p-4 mb-0 gradient-modal-content">
                    @include($path.'cadastroUsuario')
                </div>
            </div>
            <div id="produtos" class="col l12 s12 gradient-modal-content">
                <div class="row pt-2 py-4 mb-0">
                    @include($path.'cadastroProduto')
                </div>
            </div>
            <div id="animais" class="col l12 s12 gradient-modal-content">
                <div class="row pt-2 mb-0">
                    @include($path.'cadastroAnimal')
                </div>
            </div>
            <div id="servicos" class="col l12 s12 gradient-modal-content">
                <div class="row pt-2 mb-0">
                    @include($path.'cadastroServico')
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
       $('ul#tabs-produtos').tabs();
       $('ul#tabs-animais').tabs();
       $('ul#tabs-servicos').tabs();
   });
</script>
<script src="{{ asset('js/configDatepicker.js')}}"></script>
<script>
    $(document).ready(function(){
        $('select').formSelect();
    });
</script>
@stop
