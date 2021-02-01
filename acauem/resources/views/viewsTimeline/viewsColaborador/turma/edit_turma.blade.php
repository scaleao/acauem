@extends('templetes.timeline')

@section('titulo', 'Alterar turma')

@section('conteudo')

    <form action="{{route('turma.update', $dados->id)}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="put">
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <label for="validationTooltip01">Turma</label>
                <input type="text" class="form-control" id="validationTooltip01" name="turma" placeholder="Turma: A, B, C ... Z" value="{{isset($dados->turma) ? $dados->turma : ''}}">
                @error('turma')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-5 mb-3">
                <label for="validationTooltipUsername">Descricao</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="validationTooltipUsername" name="descricao" placeholder="Breve descrição" value="{{$dados->descricao}}">
                </div>
                @error('descricao')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3 mb-3">
                <label for="validationTooltipUsername">Quantidade de alunos</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="validationTooltipUsername" name="quantidade" placeholder="Breve descrição" value="{{$dados->quantidade}}">
                </div>
                @error('quantidade')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button class="btn btn-success" type="submit">Atualizar</button>
    </form>

@endsection
