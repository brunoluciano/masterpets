@extends('layouts.sistema')

@section('content')
    @can('isGerente')
        <h1>Gerente</h1>
    @elsecan('isFuncionario')
        <h1>Funcionário</h1>
    @endcan
@endsection
