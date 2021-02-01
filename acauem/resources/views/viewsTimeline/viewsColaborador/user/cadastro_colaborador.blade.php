@extends('templetes.home')

@section('titulo', $dados->titulo)

@section('conteudo')
    <div class="row justify-content-end">
        <div class="col-7">
            <p style="font-size: 10pt">Não deseja cadastrar um colaborador? <a href="{{route('home.cadastro')}}" style="padding: 6px 10px; text-decoration:none" class="btn btn-primary"> Cadastro de alunos</a></p>
        </div>
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
            <form action="{{route('home.store_colaborador')}}" method="post"  enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="text-center mt-2 mb-2">
                    <h2>Dados do Colaborador</h2>
                </div>
                <div class="form-row">
                    <div class="col-md-7 mb-3">
                        <label for="validationTooltip01">Nome completo</label>
                        <input type="text" class="form-control" id="validationTooltip01" name="name" placeholder="Exemplo: Chico Buarque de Holanda">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationTooltipUsername">RG</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="validationTooltipUsername" name="rg" placeholder="00.000.000-00" aria-describedby="validationTooltipUsernamePrepend">
                        </div>
                        @error('rg')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip03">Rua</label>
                        <input type="text" class="form-control" id="validationTooltip03" name="rua" placeholder="Rua">
                        @error('rua')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip04">Numero</label>
                        <input type="text" class="form-control" id="validationTooltip04" name="numero" placeholder="Numero">
                        @error('numero')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip05">Bairro</label>
                        <input type="text" class="form-control" id="validationTooltip05" name="bairro" placeholder="Bairro">
                        @error('bairro')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip06">Cidade</label>
                        <input type="text" class="form-control" id="validationTooltip06" name="cidade" placeholder="Cidade">
                        @error('cidade')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip07">Estado</label>
                        <input type="text" class="form-control" id="validationTooltip07" name="estado" placeholder="Estado">
                        @error('estado')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip08">CEP</label>
                        <input type="text" class="form-control" id="validationTooltip08" name="cep" placeholder="CEP">
                        @error('cep')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationDefault09">Instituição de vinculo</label>
                        <input type="text" class="form-control" id="validationDefault09" name="instituicao" placeholder="Prefeitura Municipal, UENP, etc">
                        @error('instituicao')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationDefault10">Fone</label>
                        <input type="text" class="form-control" name="fone" placeholder="(00) 00000-0000" id="validationDefault10">
                        @error('fone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-8 mb-3">
                        <label for="validationDefault11">Email</label>
                        <input type="text" class="form-control" id="validationDefault11" name="email" placeholder="chico@mail.com.br">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationDefault12">Senha</label>
                        <input type="password" class="form-control" name="password" id="validationDefault12">
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <input type="file" class="custom-file-input" id="validatedCustomFile" name="foto">
                        <label class="custom-file-label" for="validatedCustomFile">Escolha uma foto para perfil</label>
                        @error('foto')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="checkbox" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Concordo com os <a href="#">termos</a> de uso</label>
                    @error('checkbox')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center mb-3">
                    <button class="btn btn-success" type="submit">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>

@endsection
