<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index($mensagem = ""){
        $dados = User::get();
        $message = new Home();
        $message->message = $mensagem;
        return view('viewsTimeline/viewsColaborador/index', compact('message', 'dados'));
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'senha' => 'required'
        ]);
        $request->flash();
        $data = $request->all();
        if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['senha']])){
            if(Auth::user()->instituicao == null){
                return redirect()->route('timeline.index');
            }
            else{
                return redirect()->route('timeline.colabora');
            }
        }
        else{
            $dados = new Home();
            $dados->titulo = 'ACAUEM - Entrar';
            $dados->tituloPrincipal = 'Faça o Login';
            $dados->subTexto = 'Entre na sua conta já';
            $dados->capa = 'background-image: url(\'/img/entrar.jpg\')';
            $dados->conteudo = '';
            $dados->message = 'Senha ou email incorretos';
            return view('viewsHome/login', compact('dados'));
        }
    }

    public function createAl(){
        if(Auth::user()->instituicao == null){
            return redirect()->route('timeline.index');
        }
        else{
            $dados = new Home();
            $dados->titulo = 'ACAUEM - Cadastro Aluno';
            $dados->tituloPrincipal = '';
            $dados->subTexto = '';
            $dados->capa = '';
            $dados->conteudo = '';

            return view('viewsTimeline/viewsColaborador/user/cadastro_aluno', compact('dados'));
        }
    }

    public function createCo(){
        /*if(Auth::user()->instituicao == null){
            return redirect()->route('timeline.index');
        }
        else {*/
            $dados = new Home();
            $dados->titulo = 'ACAUEM - Cadastro';
            $dados->tituloPrincipal = '';
            $dados->subTexto = '';
            $dados->capa = '';
            $dados->conteudo = '';

            return view('viewsTimeline/viewsColaborador/user/cadastro_colaborador', compact('dados'));
        //}
    }

    public function storeAl(Request $request){
        if($request['genero'] == "---"){
            $request['genero'] = null;
        }

        if($request['parentesco'] == "---"){
            $request['parentesco'] = null;
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required',
            'responsavel' => 'required',
            'rg_responsavel' => 'required',
            'fone' => 'required',
            'foto' => 'required',
            'genero' => 'required',
            'parentesco' => 'required',
            'checkbox' => 'required',
        ]);
        $request->flash();
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $nameFirst = explode(" ", $data['name']);

        $data['apelido'] = $nameFirst[0];

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $num = rand(11111, 99999);
            $dir = "../storage/"; //caso ter errado tirar a funcao asset
            $extension = $file->guessClientExtension();
            $nameDoc = "foto_".$num.".".$extension;
            $data['foto'] = $dir.$nameDoc; //caso ter errado tirar a funcao asset
            $request->file('foto')->storeAs('public', $nameDoc);
        }

        $user = User::create($data);

        if($user){
            $mensagem = "Cadastro do aluno realizado com sucesso !";
            return redirect()->route('timeline.colabora', $mensagem);
        }
    }

    public function storeCo(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'rg' => 'required',
            'password' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required',
            'instituicao' => 'required',
            'fone' => 'required',
            'foto' => 'required',
            'checkbox' => 'required',
        ]);
        $request->flash();
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $nameFirst = explode(" ", $data['name']);

        $data['apelido'] = $nameFirst[0];

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $num = rand(11111, 99999);
            $dir = "../storage/"; //caso ter errado tirar a funcao asset
            $extension = $file->guessClientExtension();
            $nameDoc = "foto_".$num.".".$extension;
            $data['foto'] = $dir.$nameDoc; //caso ter errado tirar a funcao asset
            $request->file('foto')->storeAs('public', $nameDoc);
        }

        $user = User::create($data);

        if($user){
            $mensagem = "Cadastro do colaborador realizado com sucesso !";
            return redirect()->route('timeline.colabora', $mensagem);
        }
    }

    public function show(){

    }

    public function editAl($id){
        if(Auth::user()->instituicao == null){
            return redirect()->route('timeline.index');
        }
        else {
            $dados = User::find($id);
            return view('viewsTimeline/viewsColaborador/user/edit_aluno', compact('dados'));
        }
    }

    public function updateAl($id, Request $request){
        $request->validate([
            'name' => 'required',
            'rg' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required',
            'responsavel' => 'required',
            'rg_responsavel' => 'required',
            'fone' => 'required',
        ]);

        $dados = $request->all();

        $update = User::find($id)->update($dados);

        if($update){
            $mensagem = "Cadastro do aluno atualizado com sucesso !";
            return redirect()->route('timeline.colabora', $mensagem);
        }
    }

    public function destroyAl($id){
        User::find($id)->delete();

        $mensagem = "Excluido com sucesso";
        return redirect()->route('timeline.colabora', $mensagem);

    }

    public function editCo($id){
        if(Auth::user()->instituicao == null){
            return redirect()->route('timeline.index');
        }
        else {
            $dados = User::find($id);
            return view('viewsTimeline/viewsColaborador/user/edit_colaborador', compact('dados'));
        }
    }

    public function updateCo($id, Request $request){
        $request->validate([
            'name' => 'required',
            'rg' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
            'cep' => 'required',
            'instituicao' => 'required',
            'fone' => 'required',
        ]);
        $dados = $request->all();

        $update = User::find($id)->update($dados);

        if($update){
            $mensagem = "Cadastro do colaborador atualizado com sucesso !";
            return redirect()->route('timeline.colabora', $mensagem);
        }
    }

    public function destroyCo($id){
        User::find($id)->delete();

        $mensagem = "Excluido com sucesso";
        return redirect()->route('timeline.colabora', $mensagem);
    }

    function logout(){
        Auth::logout();
        return redirect('/');
    }
}
