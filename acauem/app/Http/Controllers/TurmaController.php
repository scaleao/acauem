<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\User;
use App\Models\Home;
use App\Models\Atividade;
use App\Models\Turma_aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($mensagem = "")
    {
        //Fazer trigger para resolver o problemas
        /*$sql_1 = 'SELECT   t.id, t.descricao, t.turma, COUNT(ta.user_id) as user_count
                FROM     turmas t, turma_alunos ta, users u
                WHERE    t.id = ta.turma_id AND
                         ta.user_id = u.id
                GROUP BY t.id, t.descricao, t.turma, ta.turma_id';*/

        $sql_2 = 'SELECT id, name FROM users WHERE Instituicao IS NULL AND id NOT IN (SELECT user_id FROM turma_alunos)';

        //$turmas = DB::select($sql_1)
        $turmas = Turma::get();
        if(count($turmas) == 0){
            $turmas = null;
        }
        $alunos = DB::select($sql_2);

        $message = new Home();
        $message->message = $mensagem;
        return view('viewsTimeline/viewsColaborador/turma/turma', compact('turmas', 'alunos', 'message'));
    }

    public function indexGraph()
    {
        $turmas = Turma::get();
        return response()->json($turmas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('viewsTimeline/viewsColaborador/turma/nova_turma');
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
            'cor' => 'required',
            'turma' => 'required',
            'descricao' => 'required',
        ]);
        $request->flash();
        $dados = $request->all();

        $turma = Turma::create($dados);

        if($turma){
            $mensagem = "Turma cadastrada com sucesso !";
            return redirect()->route('turma.index', $mensagem);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function show(Turma $turma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $dados = Turma::find($id);

        return view('viewsTimeline/viewsColaborador/turma/edit_turma', compact('dados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'turma' => 'required',
            'descricao' => 'required',
            'quantidade' => 'required'
        ]);

        $dados = $request->all();

        Turma::find($id)->update($dados);

        $mensagem = "Turma atualizada com sucesso !";
        return redirect()->route('turma.index', $mensagem);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Atividade::where('turma_id', $id)->delete();
        Turma_aluno::where('turma_id', $id)->delete();
        Turma::find($id)->delete();

        /*if(!$delete){
            $message = new Home();
            $message->message = "Deu ruim";
            return redirect()->route('turma.index', compact('message'));
        }*/
        $mensagem = "Turma excluida com sucesso !";
        return redirect()->route('turma.index', $mensagem);
    }
}
