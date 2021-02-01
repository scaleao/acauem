@extends('templetes.timeline')

@section('titulo', 'Inicio')

@section('conteudo')

    @if($message->message)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong></strong>{{$message->message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if($atividades)
        <h3 class="mt-5">Atividades</h3>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Data</th>
                    <th scope="col">Colaborador</th>
                    <th scope="col">Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($atividades as $atividade)
                    <a target="_blank" href="{{$atividade->link}}">
                        <tr>
                            <td>{{$atividade->titulo}}</td>
                            <td>{{$atividade->created_at}}</td>
                            <td>{{$atividade->name}}</td>
                            <td>
                                <a class="btn btn-sm btn-warning" target="_blank" href="{{$atividade->link}}">Entrar</a>
                            </td>
                        </tr>
                    </a>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong></strong>{{$message->status}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

@endsection
