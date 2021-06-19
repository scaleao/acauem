<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{route('home.index')}}">ACAUEM</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.index')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.sobre')}}">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('index.publication')}}">Publicações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.apoiadores')}}">Apoiadores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.contato')}}">Contato</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.entrar')}}">ENTRAR</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<header class="masthead" style="{{$dados->capa}}">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>{{$dados->tituloPrincipal}}</h1>
                    <span class="subheading">{{$dados->subTexto}}</span>
                </div>
            </div>
        </div>
    </div>
</header>
