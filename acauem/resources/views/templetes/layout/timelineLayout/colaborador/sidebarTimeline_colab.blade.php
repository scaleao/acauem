<nav id="sidebar">
    <div class="sidebar-header">
        <h3>ACAUEM</h3>
    </div>

    <ul class="list-unstyled components">
        <div class="row">
            <div class="col">
                <img style="width: 50px; height: 50px; border-radius: 50%; margin-left: 2px" src="{{Auth::user()->foto}}">
            </div>
            <div class="col">
                <p class="text-left">{{Auth::user()->apelido}}</p>
            </div>
        </div>
        <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-plus-circle"></i> Cadastros</a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="{{route('home.cadastro')}}">Cadastrar aluno</a>
                </li>
                <li>
                    <a href="{{route('home.cadastro-colaborador')}}">Cadastrar colaborator</a>
                </li>
                <li>
                    <a href="{{route('atividade.create')}}">Cadastrar atividade</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{route('turma.index')}}"><i class="fas fa-users"></i> Turmas</a>
        </li>
        <li>
            <a href="{{route('atividade.index')}}"><i class="fas fa-book"></i> Atividades</a>
        </li>
        <!--<li> EXEMPLO DE LISTA ATIVA
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Enviar solicitação</a>
        </li>
        <li>
            <a href="#">Turmas</a>
        </li>
    </ul>-->

    <ul class="list-unstyled CTAs">
        <li>
            <a href="{{route('user.logout')}}" class="btn btn-danger">Sair <i class="fas fa-sign-out-alt"></i></a>
        </li>
    </ul>
</nav>
