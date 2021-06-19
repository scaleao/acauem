@extends('templetes.timeline')

@section('titulo', 'Inicio')

@section('conteudo')

    @if($message->message)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong></strong>{{$message->message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!--<div class="chart-container">
        <canvas id="myChart"></canvas>
    </div>-->

    <div class="body-colab-index">
        <div class="container-fluid">
            <div class="row">
                @foreach($dados as $usuario)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-colab-index">
                            <!--<div class="wrapper">-->
                                <div class="header-colab-index">{{$usuario->name}}</div>

                                <div class="banner-img-colab-index">
                                    <img src="{{Storage::url($usuario->foto)}}" alt="ImagemUser">
                                </div>

                                <div class="dates-colab-index">
                                    <div class="start">
                                        <strong>STARTS</strong> {{$usuario->created_at}}
                                        <span></span>
                                    </div>
                                    <div class="ends">
                                        <strong>ENDS</strong> 14:30 JAN 2015
                                    </div>
                                </div>

                                <div class="stats-colab-index">

                                    <div>
                                        <strong>INVITED</strong> 3098
                                    </div>

                                    <div>
                                        <strong>JOINED</strong> 562
                                    </div>

                                    <div>
                                        <strong>DECLINED</strong> 182
                                    </div>

                                </div>

                            <div class="footer-colab-index">
                                @if($usuario->instituicao == null)
                                    <a class="btn btn-sm btn-primary" href="{{route('aluno.edit', $usuario->id)}}"
                                       data-toggle="tooltip"
                                       data-original-title="Editar esse usuario"><i class="fas fa-edit"></i> Editar</a>
                                    <a class="btn btn-sm btn-danger" href="{{route('aluno.destroy', $usuario->id)}}"
                                       data-toggle="tooltip"
                                       data-original-title="Remover esser usuario"><i class="fas fa-trash"></i> Excluir</a>
                                @else
                                    <a class="btn btn-sm btn-primary" href="{{route('colaborador.edit', $usuario->id)}}"
                                       data-toggle="tooltip"
                                       data-original-title="Editar esse usuario"><i class="fas fa-edit"></i> Editar</a>
                                    <a class="btn btn-sm btn-danger" href="{{route('colaborador.destroy', $usuario->id)}}"
                                       data-toggle="tooltip"
                                       data-original-title="Remover esser usuario"><i class="fas fa-trash"></i> Excluir</a>
                                @endif
                            </div>
                            <!--</div>-->
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
