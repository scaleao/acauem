@extends('templetes.timeline')

@section('titulo', 'Turma')

@section('conteudo')

    <h1>Turma: {{$alunos[0]->turma}}</h1>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Alunos <div href="#" class="badge badge-warning">{{count($alunos)}}</div></th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach($alunos as $aluno)
                <tr>
                    <td>{{$aluno->name}}</td>
                    <td>
                        <a class="btn btn-sm btn-info" href="#">Alterar</a>
                        <a class="btn btn-sm btn-warning" href="#">Visualizar</a>
                        <a class="btn btn-sm btn-danger" href="{{route('turma.aluno.destroy', $aluno->id)}}">Remover da turma</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
