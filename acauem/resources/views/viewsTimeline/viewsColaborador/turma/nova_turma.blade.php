@extends('templetes.timeline')

@section('titulo', 'Inicio')

@section('conteudo')
    <div class="row">
        <div class="container border border-secondary">
            <h1 class="text-center">Nova turma</h1>
            <form action="{{route('turma.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-row">
                    <div class="col-md-2 mb-3">
                        <label for="validationTooltip01">Cor</label>
                        <input type="color" class="form-control" id="validationTooltip01" name="cor" value="{{old('cor')}}">
                        @error('turma')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip01">Turma</label>
                        <input type="text" class="form-control" id="validationTooltip01" name="turma" placeholder="Turma: A, B, C ... Z" value="{{old('turma')}}">
                        @error('turma')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-7 mb-3">
                        <label for="validationTooltipUsername">Descricao</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="validationTooltipUsername" name="descricao" placeholder="Breve descrição" value="{{old('descricao')}}">
                        </div>
                        @error('descricao')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-center mb-3">
                    <button class="btn btn-success" type="submit">Cadastrar</button>
                    <a class="btn btn-danger" href="{{route('turma.index')}}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

@endsection
