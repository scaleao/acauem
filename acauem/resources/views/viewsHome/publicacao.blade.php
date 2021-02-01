@extends('templetes.home')

@section('titulo', $dados->titulo)

@section('conteudo')
    <div class="row">
        <div class="container">
            <p>{{$dados->conteudo}}</p>
        </div>
    </div>
@endsection
