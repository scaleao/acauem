@extends('templetes.timeline')

@section('titulo', $dados->titulo)

@section('conteudo')
    <div class="row justify-content-end mr-5 mb-2">
        <a href="{{route('colaborador.destroy', $dados->id)}}" class="btn btn-danger"><img src="../storage/rubbish-bin.png" style="width: 25px; height: 25px;">DELETAR USUARIO</a>
    </div>
    <div class="row">
        <div class="container border border-secondary">
            @if ($errors->any())
                <div>
                    <ul class="bg-danger">
                        @foreach ($errors->all() as $error)
                            <li class="text-white">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('colaborador.update', $dados->id)}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="put">
                <div class="form-row">
                    <div class="col-md-7 mb-3">
                        <label for="validationTooltip01">Nome completo</label>
                        <input type="text" class="form-control" id="validationTooltip01" name="name" placeholder="Exemplo: Chico Buarque de Holanda" value="{{isset($dados->name) ? $dados->name : ''}}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltipUsername">RG</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="validationTooltipUsername" name="rg" placeholder="00.000.000-00" aria-describedby="validationTooltipUsernamePrepend"  value="{{isset($dados->rg) ? $dados->rg : ''}}">
                        </div>
                        @error('rg')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip03">Rua</label>
                        <input type="text" class="form-control" id="validationTooltip03" name="rua" placeholder="Rua"  value="{{isset($dados->rua) ? $dados->rua : ''}}">
                        @error('rua')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip04">Numero</label>
                        <input type="text" class="form-control" id="validationTooltip04" name="numero" placeholder="Numero"  value="{{isset($dados->numero) ? $dados->numero : ''}}">
                        @error('numero')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip05">Bairro</label>
                        <input type="text" class="form-control" id="validationTooltip05" name="bairro" placeholder="Bairro" value="{{isset($dados->bairro) ? $dados->bairro : ''}}">
                        @error('bairro')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip06">Cidade</label>
                        <input type="text" class="form-control" id="validationTooltip06" name="cidade" placeholder="Cidade" value="{{isset($dados->cidade) ? $dados->cidade : ''}}">
                        @error('cidade')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip07">Estado</label>
                        <input type="text" class="form-control" id="validationTooltip07" name="estado" placeholder="Estado" value="{{isset($dados->estado) ? $dados->estado : ''}}">
                        @error('estado')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip08">CEP</label>
                        <input type="text" class="form-control" id="validationTooltip08" name="cep" placeholder="CEP" value="{{isset($dados->cep) ? $dados->cep : ''}}">
                        @error('cep')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault09">Instituição de vinculo</label>
                        <input type="text" class="form-control" id="validationDefault09" name="instituicao" placeholder="Prefeitura Municipal, UENP, etc" value="{{isset($dados->instituicao) ? $dados->instituicao : ''}}">
                        @error('instituicao')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationDefault10">Fone</label>
                        <input type="text" class="form-control" name="fone" placeholder="(00) 00000-0000" id="validationDefault10" value="{{isset($dados->fone) ? $dados->fone : ''}}">
                        @error('fone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-center mb-3">
                    <button class="btn btn-success" type="submit">Alterar</button>
                    <a class="btn btn-danger" href="{{route('timeline.colabora')}}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

@endsection
