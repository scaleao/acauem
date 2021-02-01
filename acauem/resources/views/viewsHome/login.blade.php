@extends('templetes.home')

@section('titulo', $dados->titulo)

@section('conteudo')
    <div class="row">
        <div class="container">
            <div class="text-center mt-2 mb-5">
                <img src="img/logo-acauem.png" class="rounded" alt="logo">
                <p style="font-size: 29px">ENTRAR</p>
            </div>
        </div>
    </div>
    @if($dados->message)
        <div class="alert alert-danger" role="alert">
            {{$dados->message}}
        </div>
    @endif
    <div class="row">
        <div class="container border border-secondary rounded col-md-6 mb-3">
            @if ($errors->any())
                <div>
                    <ul class="bg-danger">
                        @foreach ($errors->all() as $error)
                            <li class="text-white">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{route('home.login')}}">
                {{csrf_field()}}
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="email" placeholder="Login: chico@mail.com" required>
                </div>
                <div class="form-group">
                    <div class="text-right"><a style="font-size: 10pt" href="#">Esqueceu sua senha?<a></div>
                    <input type="password" class="form-control" name="senha" required>
                </div>
                <div class="form-group custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="checkbox" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Lembrar-me</label>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-success" type="submit">Entrar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="container border border-secondary rounded col-md-6 mb-3">
            <div class="text-center pt-4 pb-3">
                <p style="font-size: 10pt">Você é novo aqui? <a href="#"> Nos informe já para ter acesso!</a></p>
            </div>
        </div>
    </div>
@endsection
