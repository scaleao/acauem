@extends('templetes.timeline')

@section('titulo', 'Inicio')

@section('conteudo')

    @if(Auth::user()->instituicao == null)
        <h1> Ola aluno</h1>
    @else
        <h1> Ola colaborador</h1>
    @endif

@endsection
