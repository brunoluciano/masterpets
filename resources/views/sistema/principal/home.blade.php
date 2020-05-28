@extends('layouts.sistema')

@section('content')
    @can('isGerente')
        <h1>GERENTE / FUNCIONÁRIO</h1>
    @endcan
@endsection
