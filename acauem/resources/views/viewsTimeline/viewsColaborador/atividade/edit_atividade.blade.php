@extends('templetes.timeline')

@section('titulo', 'Alterar atividade')

@section('conteudo')
    <div class="row">
        <div class="container border border-secondary">
            <h1>Alterar atividade</h1>
            <form action="{{route('atividade.update', $dados->id)}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="put">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="exampleFormControlInput1">Titulo da atividade</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="titulo" value="{{$dados->titulo}}">
                        @error('titulo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="exampleFormControlInput2">Link da atividade</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" name="link" value="{{$dados->link}}">
                        @error('link')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="exampleFormControlInput3">Para turma</label>
                        <div class="input-group">
                            <select name="turma_id" class="form-control" for="exampleFormControlInput3">
                                <option>---</option>
                                @foreach ($turmas as $turma)
                                    <option value="{{$turma->id}}">{{$turma->turma}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('turma_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput4">Descrição</label>
                    <input type="text" class="form-control" id="exampleFormControlInput4" name="descricao" value="{{$dados->descricao}}">
                    @error('descricao')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center mb-3">
                    <button class="btn btn-success" type="submit">Alterar</button>
                    <a class="btn btn-danger" href="{{route('atividade.index')}}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

@endsection
