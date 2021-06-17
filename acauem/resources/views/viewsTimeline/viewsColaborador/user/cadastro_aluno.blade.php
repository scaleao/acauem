@extends('templetes.timeline')

@section('titulo', $dados->titulo)

@section('conteudo')
    <div class="row justify-content-end">
        <div class="col-7">
            <p style="font-size: 10pt">Não deseja cadastrar um aluno? <a href="{{route('home.cadastro-colaborador')}}" style="padding: 6px 10px; text-decoration:none" class="btn btn-primary"> Cadastro de colaboradores</a></p>
        </div>
    </div>
    <div class="row">
        <div class="container border border-secondary rounded">
            @if ($errors->any())
                <div>
                    <ul class="bg-danger">
                        @foreach ($errors->all() as $error)
                            <li class="text-white">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('home.store_aluno')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="text-center mt-2 mb-2">
                    <h2>Dados do Aluno</h2>
                </div>
                <div class="form-row">
                    <div class="col-md-5 mb-3">
                        <label for="validationTooltip01">Nome completo</label>
                        <input type="text" class="form-control" id="validationTooltip01" name="name" placeholder="Exemplo: Chico Buarque de Holanda" value="{{old('name')}}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip01">Data de nascimento</label>
                        <input type="date" class="form-control" id="validationTooltip01" name="nascimento" placeholder="" value="{{old('nascimento')}}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 mb-2">
                        <label for="exampleFormControlInput3">Sexo</label>
                        <div class="input-group">
                            <select name="genero" class="form-control" for="exampleFormControlInput3">
                                <option>---</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Masculino">Masculino</option>
                            </select>
                        </div>
                        @error('genero')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 mb-2">
                        <label for="validationTooltipUsername">RG</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="validationTooltipUsername" name="rg" placeholder="00.000.000-00" value="{{old('rg')}}" aria-describedby="validationTooltipUsernamePrepend">
                        </div>
                        @error('rg')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="text-center mt-5 mb-2">
                    <h2>Dados do Responsável</h2>
                </div>
                <div class="form-row">
                    <div class="col-md-5 mb-3">
                        <label for="validationDefault09">Nome do Responsavel</label>
                        <input type="text" class="form-control" id="validationDefault09" name="responsavel" placeholder="Maria Elena Aparecida" value="{{old('responsavel')}}">
                        @error('responsavel')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="exampleFormControlInput3">Parentesco</label>
                        <div class="input-group">
                            <select name="parentesco" class="form-control" for="exampleFormControlInput3">
                                <option>---</option>
                                <option value="Irma">Irmã</option>
                                <option value="Irmao">Irmão</option>
                                <option value="Mae">Mãe</option>
                                <option value="Pai">Pai</option>
                                <option value="Prima">Prima</option>
                                <option value="Primo">Primo</option>
                                <option value="Tia">Tia</option>
                                <option value="Tio">Tio</option>
                                <option value="Vó">Vó</option>
                                <option value="Vô">Vô</option>
                                <option value="Bisavó">Bisavó</option>
                                <option value="Bisavô">Bisavô</option>
                            </select>
                        </div>
                        @error('genero')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationDefault10">RG</label>
                        <input type="text" class="form-control" id="validationDefault10" name="rg_responsavel" placeholder="00.000.000-00" value="{{old('rg_responsavel')}}">
                        @error('rg_responsavel')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationDefault11">Fone</label>
                        <input type="text" class="form-control" name="fone" placeholder="(00) 00000-0000" value="{{old('fone')}}" id="validationDefault11">
                        @error('fone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip03">Rua</label>
                        <input type="text" class="form-control" id="validationTooltip03" name="rua" placeholder="Rua" value="{{old('rua')}}">
                        @error('rua')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip04">Numero</label>
                        <input type="text" class="form-control" id="validationTooltip04" name="numero" placeholder="Numero"  value="{{old('numero')}}">
                        @error('numero')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip05">Bairro</label>
                        <input type="text" class="form-control" id="validationTooltip05" name="bairro" placeholder="Bairro" value="{{old('bairro')}}">
                        @error('bairro')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip06">Cidade</label>
                        <input type="text" class="form-control" id="validationTooltip06" name="cidade" placeholder="Cidade" value="{{old('cidade')}}">
                        @error('cidade')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip07">Estado</label>
                        <input type="text" class="form-control" id="validationTooltip07" name="estado" placeholder="Estado" value="{{old('estado')}}">
                        @error('estado')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationTooltip08">CEP</label>
                        <input type="text" class="form-control" id="validationTooltip08" name="cep" placeholder="CEP" value="{{old('cep')}}">
                        @error('cep')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-8 mb-3">
                        <label for="validationDefault12">Email</label>
                        <input type="text" class="form-control" id="validationDefault12" name="email" placeholder="chico@mail.com.br" value="{{old('email')}}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationDefault13">Senha</label>
                        <input type="password" class="form-control" name="password" id="validationDefault13">
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
