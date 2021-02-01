<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Publicacao;
use Illuminate\Http\Request;

class PublicacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = new Home();
        $dados->titulo = 'ACAUEM - Publicacões';
        $dados->tituloPrincipal = 'PUBLICAÇÕES';
        $dados->subTexto = 'Encontre aqui todas as publicações do Projeto';
        $dados->capa = 'background-image: url(\'/img/publicacoes.jpg\')';
        $dados->conteudo = null;

        //$publicacaos = Publicacao::where('id', 1)->get();
        $publicacaos = Publicacao::orderBy('id', 'desc')->get();

        //dd($publicacaos, $dados);

        return view('viewsHome/index', compact('dados', 'publicacaos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'tituloPrincipal' => 'required',
            'subTexto' => 'required',
            'capa' => 'required',
            'conteudo' => 'required',
        ]);

        $data = $request->all();

        if($request->hasFile('capa')){
            $file = $request->file('capa');
            $num = rand(11111, 99999);
            $dir = "background-image: url('../storage/"; //caso ter errado tirar a funcao asset
            $extension = $file->guessClientExtension();
            $nameDoc = "capa_".$num.".".$extension;
            $data['capa'] = $dir.$nameDoc."')"; //caso ter errado tirar a funcao asset
            $path = $request->file('capa')->storeAs(
                'public', $nameDoc
            );
        }
        Publicacao::create($data); //Fazer os ajustes do mecanismo de publicação
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publicacao  $publicacao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dados = Publicacao::find($id);

        return view('viewsHome/publicacao', compact('dados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publicacao  $publicacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Publicacao $publicacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publicacao  $publicacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publicacao $publicacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publicacao  $publicacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publicacao $publicacao)
    {
        //
    }
}
