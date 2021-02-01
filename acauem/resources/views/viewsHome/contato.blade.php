@extends('templetes.home')

@section('titulo', $dados->titulo)

@section('conteudo')
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <p>Projeto Social ACAUEM (Associação das Crianças Alegres na Esperanças com Maria) é localizado na Rua Frei Rafaela Proner, nº 1323, Bandeirantes – PR, 86360-000, é um projeto social mantido pela Prefeitura Municipal de Bandeirantes e pela ‘Comunidade Ninguém Como Deus’ ligado a Igreja Católica de Bandeirantes.</p>
                    <p>O Projeto visa atender crianças em seu contra turno do período escolar regular, tais crianças se encontram em faixa etária de 06 à 15 anos e são dividas em 4 turmas (A, B, C e D). Sendo a Turma A recebendo os alunos mais novos e a Turma D os mais velhos, respectivamente.</p>
                    <p>O horário dentro do ACAUEM funciona da seguinte forma, os portões do Projeto se abrem rigorosamente às 13h</p>

                    <h2 class="section-heading">Como chegar</h2>
                    <div class="map-responsive">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14679.126078612126!2d-50.3725011!3d-23.1050924!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfad85e6f6014ba49!2sProjeto%20Cauem!5e0!3m2!1spt-BR!2sbr!4v1579113109037!5m2!1spt-BR!2sbr" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection
