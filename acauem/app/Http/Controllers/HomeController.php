<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Publicacao;

class HomeController extends Controller
{
    public function index(){
        $dados = new Home();
        $dados->titulo = 'ACAUEM';
        $dados->tituloPrincipal = 'ACAUEM';
        $dados->subTexto = 'Associação das Crianças Alegres Unidas na Esperança de Maria';
        $dados->capa = 'background-image: url(\'/img/acauem.jpg\')';
        $dados->conteudo = null;

        //$publicacaos = Publicacao::where('id', 1)->get();
        $publicacaos = Publicacao::orderBy('id', 'desc')->take(3)->get();

        //dd($publicacaos, $dados);

        return view('viewsHome/index', compact('dados', 'publicacaos'));
    }

    public function sobre(){

    }

    public function publicacoes(){

    }

    public function apoiadores(){

    }

    public function contato(){
        $dados = new Home();
        $dados->titulo = 'ACAUEM - Contato';
        $dados->tituloPrincipal = null;
        $dados->sub = null;
        $dados->capa = 'background-image: url(\'/img/acauemLocation.jpg\')';
        $dados->conteudo = '';

        return view('viewsHome/contato', compact('dados'));
    }

    public function entrar(){
        $dados = new Home();
        $dados->titulo = 'ACAUEM - Entrar';
        $dados->tituloPrincipal = 'Faça o Login';
        $dados->subTexto = 'Entre na sua conta já';
        $dados->capa = 'background-image: url(\'/img/entrar.jpg\')';
        $dados->conteudo = '';
        return view('viewsHome/login', compact('dados'));
    }

    public function create(){
        $dados = new Home();
        $dados->titulo = 'ACAUEM - Contato';
        $dados->tituloPrincipal = null;
        $dados->subTexto = null;
        $dados->capa = 'background-image: url(\'/img/acauemLocation.jpg\')';
        $dados->conteudo = '';
        return view('viewsTimeline/newPublicacao', compact('dados'));
    }

}
