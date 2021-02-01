<?php

namespace App\Http\Controllers;

use App\Models\Atividade;
use App\Models\Home;
use App\Models\Turma;
use App\Models\Turma_aluno;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AtividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($mensagem = "")
    {
        $atividades = DB::table('atividades')
            ->join('users', 'atividades.user_id', '=', 'users.id')
            ->join('turmas', 'atividades.turma_id', '=', 'turmas.id')
            ->select('atividades.*', 'users.name', 'turmas.turma')
            ->get();

        $id = Auth::user()->id;
        $my_atividades = DB::table('atividades')
            ->join('users', 'atividades.user_id', '=', 'users.id')
            ->join('turmas', 'atividades.turma_id', '=', 'turmas.id')
            ->where('user_id', $id)
            ->select('atividades.*', 'users.name', 'turmas.turma')
            ->get();

        if(count($my_atividades) == 0){
            $my_atividades = null;
        }

        if(count($atividades) == 0){
            $atividades = null;
        }

        $message = new Home();
        $message->message = $mensagem;

        return view('viewsTimeline/viewsColaborador/atividade/atividade', compact('my_atividades', 'atividades', 'message'));
    }

    public function indexAluno($mensagem = "")
    {
        $message = new Home();

        $id = Auth::user()->id;
        $turmaAluno = Turma_aluno::where('user_id', '=', $id)->first();
        $turma_id = $turmaAluno['turma_id'];
        $atividades = "";
        if($turmaAluno){
            $atividades = DB::table('atividades')
                ->join('users', 'atividades.user_id', '=', 'users.id')
                ->join('turmas', 'atividades.turma_id', '=', 'turmas.id')
                ->select('atividades.*', 'users.name', 'turmas.turma')
                ->where('turma_id', '=', $turma_id)
                ->get();
        }
        else{
            $message->status = "Você ainda não esta cadastrado em nenhuma turma";
        }

        $message->message = $mensagem;

        return view('viewsTimeline/viewsAluno/index', compact('atividades', 'message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $turmas = Turma::get();
        return view('viewsTimeline.viewsColaborador.atividade.nova_atividade', compact('turmas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request['turma_id'] == "---"){
            $request['turma_id'] = null;
        }

        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'turma_id' => 'required',
            'link' => 'required'
        ]);

        $data = $request->all();
        $id = Auth::user()->id;
        $data['user_id'] = $id;
        $data['turma_id'] = (int) $data['turma_id'];

        $atividade = Atividade::create($data);

        if($atividade){
            $mensagem = "Atividade cadastrada com sucesso";

            return redirect()->route('atividade.index', $mensagem);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function show(Atividade $atividade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = Atividade::find($id);
        $turmas = Turma::get();
        return view('viewsTimeline/viewsColaborador/atividade/edit_atividade', compact('dados', 'turmas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        if($request['turma_id'] == "---"){
            $request['turma_id'] = null;
        }

        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'turma_id' => 'required',
            'link' => 'required'
        ]);

        $dados = $request->all();

        $update = Atividade::find($id)->update($dados);

        if($update){
            $mensagem = "Atividade atualizada com sucesso !";
            return redirect()->route('atividade.index', $mensagem);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Atividade::find($id)->delete();
        if($delete){
            $mensagem = "Atividade excluida com sucesso !";
            return redirect()->route('atividade.index', $mensagem);
        }
    }
}
