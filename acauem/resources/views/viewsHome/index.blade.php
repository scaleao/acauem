@extends('templetes.home')

@section('titulo', $dados->titulo)

@section('conteudo')
    @foreach ($publicacaos as $publicacao)
        <div class="post-preview">
            <a href="{{route('view.publication', $publicacao->id)}}">
                <h2 class="post-title">
                    {{$publicacao->tituloPrincipal}}
                </h2>
                <h3 class="post-subtitle">
                    {{$publicacao->subTexto}}
                </h3>
            </a>
            <p class="post-meta">Postado por
                <a href="#"> ??? </a>
                {{$publicacao->created_at}}</p>
        </div>
        <hr>
    @endforeach
    <!--
     EXEMPLO PEGAR IMAGEM
    <div class="row">
        <div class="container">
            <img src="{//asset('storage/capa_64381.png')}}">
    </div>
    </div>


    <div class="post-preview">
        <a href="#">
            <h2 class="post-title">
                BEM-VINDO ao ACAUEM 2020
            </h2>
            <h3 class="post-subtitle">
                Projeto Social - Associação das Crianças Alegres Unidas na Esperança de Maria
            </h3>
        </a>
        <p class="post-meta">Postado por
            <a href="#">Start Bootstrap</a>
            on September 24, 2019</p>
    </div>
    <hr>
    <div class="post-preview">
        <a href="post.html">
            <h2 class="post-title">
                I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.
            </h2>
        </a>
        <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on September 18, 2019</p>
    </div>
    <hr>
    <div class="post-preview">
        <a href="post.html">
            <h2 class="post-title">
                Science has not yet mastered prophecy
            </h2>
            <h3 class="post-subtitle">
                We predict too much for the next year and yet far too little for the next ten.
            </h3>
        </a>
        <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on August 24, 2019</p>
    </div>
    <hr>
    <div class="post-preview">
        <a href="post.html">
            <h2 class="post-title">
                Failure is not an option
            </h2>
            <h3 class="post-subtitle">
                Many say exploration is part of our destiny, but it’s actually our duty to future generations.
            </h3>
        </a>
        <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            on July 8, 2019</p>
    </div>
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <p>Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe, a round earth in which all the directions eventually meet, in which there is no center because every point, or none, is center — an equal earth which all men occupy as equals. The airman's earth, if free men make it, will be truly round: a globe in practice, not in theory.</p>

                    <p>Science cuts two ways, of course; its products can be used for both good and evil. But there's no turning back from science. The early warnings about technological dangers also come from science.</p>

                    <p>What was most significant about the lunar voyage was not that man set foot on the Moon but that they set eye on the earth.</p>

                    <p>A Chinese tale tells of some men sent to harm a young girl who, upon seeing her beauty, become her protectors rather than her violators. That's how I felt seeing the Earth for the first time. I could not help but love and cherish her.</p>

                    <p>For those who have seen the Earth from space, and for the hundreds and perhaps thousands more who will, the experience most certainly changes your perspective. The things that we share in our world are far more valuable than those which divide us.</p>

                    <h2 class="section-heading">The Final Frontier</h2>

                    <p>There can be no thought of finishing for ‘aiming for the stars.’ Both figuratively and literally, it is a task to occupy the generations. And no matter how much progress one makes, there is always the thrill of just beginning.</p>

                    <p>There can be no thought of finishing for ‘aiming for the stars.’ Both figuratively and literally, it is a task to occupy the generations. And no matter how much progress one makes, there is always the thrill of just beginning.</p>

                    <blockquote class="blockquote">The dreams of yesterday are the hopes of today and the reality of tomorrow. Science has not yet mastered prophecy. We predict too much for the next year and yet far too little for the next ten.</blockquote>

                    <p>Spaceflights cannot be stopped. This is not the work of any one man or even a group of men. It is a historical process which mankind is carrying out in accordance with the natural laws of human development.</p>

                    <h2 class="section-heading">Reaching for the Stars</h2>

                    <p>As we got further and further away, it [the Earth] diminished in size. Finally it shrank to the size of a marble, the most beautiful you can imagine. That beautiful, warm, living object looked so fragile, so delicate, that if you touched it with a finger it would crumble and fall apart. Seeing this has to change a man.</p>

                    <a href="#">
                        <img class="img-fluid" src="img/post-sample-image.jpg" alt="">
                    </a>
                    <span class="caption text-muted">To go places and do things that have never been done before – that’s what living is all about.</span>

                    <p>Space, the final frontier. These are the voyages of the Starship Enterprise. Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before.</p>

                    <p>As I stand out here in the wonders of the unknown at Hadley, I sort of realize there’s a fundamental truth to our nature, Man must explore, and this is exploration at its greatest.</p>

                    <p>Placeholder text by
                        <a href="http://spaceipsum.com/">Space Ipsum</a>. Photographs by
                        <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>.</p>
                </div>
            </div>
        </div>
    </article> -->
@endsection
