@extends('templetes.timeline')

@section('titulo', 'Nova Publicação')

@section('conteudo')

    @if ($errors->any())
        <div>
            <ul class="bg-danger">
                @foreach ($errors->all() as $error)
                    <li class="text-white">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('publication')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="container col-md-8 justify-content-center">
            <div class="form-row mb-5">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="capa">
                    <label class="custom-file-label" for="validatedCustomFile">Escolha uma foto para capa</label>
                    @error('capa')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Titulo Principal</label>
                    <input type="text" class="form-control" name="tituloPrincipal" id="inputEmail4">
                    @error('tituloPrincipal')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Titulo na aba</label>
                    <input type="text" class="form-control" name="titulo" id="inputPassword4">
                    @error('titulo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Sub texto</label>
                <input type="text" class="form-control" name="subTexto" id="inputAddress" placeholder="">
                @error('subTexto')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="inputAddress2">Escreva o conteudo aqui</label>
                <textarea type="text" class="form-control" id="inputAddress2" name="conteudo" placeholder="Escreva aqui mais informações sobre o seu conteúdo" style="height: 200px"></textarea>
                @error('conteudo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="row justify-content-center">
                <input type="submit" class="btn-success" value="Publicar">
            </div>
        </div>
    </form>
@endsection
