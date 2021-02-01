@extends('templetes.timeline')

@section('titulo', 'Atividades')

@section('conteudo')

    @if($message->message)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong></strong>{{$message->message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if($my_atividades)
        <h3>Atividade criadas por você:</h3>
        <div class="row">
            <div class="container">
                <div class="d-flex justify-content-end">
                    <a href="{{route('atividade.create')}}" class="btn btn-success">Nova atividade</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Turma</th>
                    <th scope="col">Data</th>
                    <th scope="col">Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($my_atividades as $atividade)
                        <tr>
                            <td>{{$atividade->titulo}}</td>
                            <td>{{$atividade->turma}}</td>
                            <td>{{$atividade->created_at}}</td>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{route('atividade.edit', $atividade->id)}}"><i class="fas fa-edit"></i> Alterar..</a>
                                <a class="btn btn-sm btn-warning" href="#"><i class="fas fa-eye"></i> Visualizar</a>
                                <a class="btn btn-sm btn-danger" href="{{route('atividade.destroy', $atividade->id)}}"><i class="fas fa-trash"></i> Remover</a>
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            Não foram encontradas atividades criadas por você <a href="{{route('atividade.create')}}" class="btn btn-primary"> Nova atividade</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if($atividades)
        <h3 class="mt-5">Atividades de colaboradores:</h3>
        <div class="table-responsive border border-secondary rounded" data-spy="scroll" data-offset="0" style="height: 400px">
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Turma</th>
                    <th scope="col">Data</th>
                    <th scope="col">Colaborador</th>
                    <th scope="col">Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($atividades as $atividade)
                        <tr>
                            <td>{{$atividade->titulo}}</td>
                            <td>{{$atividade->turma}}</td>
                            <td>{{$atividade->created_at}}</td>
                            <td>{{$atividade->name}}</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="#">Visualizar</a>
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            <strong></strong>Ainda não há atividades cadastradas por outros colaboradores
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@endsection
