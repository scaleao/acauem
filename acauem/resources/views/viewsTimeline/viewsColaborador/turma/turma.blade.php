@extends('templetes.timeline')

@section('titulo', 'Turmas')

@section('conteudo')

    @if($message->message)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong></strong>{{$message->message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(!empty($turmas))

        <div class="row">
            <div class="container">
                <div class="d-flex justify-content-end">
                    <a href="{{route('turma.create')}}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Nova turma</a>
                </div>
            </div>
        </div>
        <h3>Turmas: <span class="badge badge-warning">{{count($turmas)}}</span></h3>
        <div class="table-responsive border border-secondary rounded">
            <table class="table table-hover m-auto">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Turma</th>
                    <th scope="col">Descrição</th>
                    <th scope="col" class="text-center">Quantidade</th>
                    <th scope="col" class="text-center">Ações</th>
                </tr>
                </thead>
                <tbody class="m-auto">
                @foreach($turmas as $turma)
                    <tr>
                        <td>{{$turma->turma}}</td>
                        <td>{{$turma->descricao}}</td>
                        <td class="text-center"><span class="badge badge-warning">{{$turma->quantidade}} alunos</span></td>
                        <td class="text-center">
                            <a class="btn btn-sm btn-info" href="{{route('turma.edit', $turma->id)}}"><i class="fas fa-edit"></i> Alterar..</a>
                            @if($turma->quantidade == 0)
                                <a class="btn btn-sm btn-warning disabled" href="{{route('turmas.view', $turma->id)}}"><i class="fas fa-eye"></i> Visualizar</a>
                                <a class="btn btn-sm btn-danger" href="{{route('turma.destroy', $turma->id)}}"><i class="fas fa-trash"></i> Remover</a>
                            @else
                                <a class="btn btn-sm btn-warning" href="{{route('turmas.view', $turma->id)}}"><i class="fas fa-eye"></i> Visualizar</a>
                                <a class="btn btn-sm btn-danger disabled" href="{{route('turma.destroy', $turma->id)}}"><i class="fas fa-trash"></i> Remover</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            Não ha turmas para organizar os alunos! <a href="{{route('turma.create')}}" class="btn btn-primary"> Nova turma</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if($alunos)
        <h3 class="mt-5">Organize os alunos nas turmas: </h3>
        @if ($errors->any())
            <div>
                <ul class="bg-danger">
                    @foreach ($errors->all() as $error)
                        <li class="text-white">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="table-responsive border border-secondary rounded" data-spy="scroll" data-offset="0" style="height: 400px">
            <table class="table table-hover">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Turmas</th>
                    <th scope="col">Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($alunos as $aluno)
                    <tr>
                        <td>{{$aluno->name}}</td>
                        <form action="{{route('turmas.alunos')}}" method="post">
                            {{csrf_field()}}
                            <td>
                                <input type="hidden" name="user_id" value="{{$aluno->id}}">
                                <div class="input-group">
                                    <select name="turma_id" class="form-control">
                                        <option>---</option>
                                        @if(!empty($turmas))
                                            @foreach ($turmas as $turma)
                                                <option value="{{$turma->id}}">{{$turma->turma}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-sm btn-success">Add aluno <i class="fas fa-chevron-circle-right"></i></button>
                            </td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            Não ha alunos para organiza-los em turmas! :) <a href="{{route('home.cadastro')}}" class="btn btn-primary"> Cadastrar aluno</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@endsection
