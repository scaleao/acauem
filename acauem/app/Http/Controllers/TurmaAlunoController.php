<?php

namespace App\Http\Controllers;

use App\Models\Turma_aluno;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TurmaAlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if($request['turma_id'] == "---"){
            $request['turma_id'] = null;
        }

        $request->validate([
            'turma_id' => 'required'
        ]);

        $data = $request->all();
        $user_id = $data['user_id'];
        $user_data = Turma_aluno::where('user_id', $user_id)->first();

        if(!isset($user_data)){
            Turma_aluno::create($data);
        }
        else{
            $aluno = Turma_aluno::where('user_id', $user_id)->first();
            Turma_aluno::find($aluno->id)->update($data);
        }

        return redirect()->route('turma.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Turma_aluno  $turma_aluno
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alunos = DB::table('turma_alunos')
            ->join('users', 'turma_alunos.user_id', '=', 'users.id')
            ->join('turmas', 'turma_alunos.turma_id', '=', 'turmas.id')
            ->where('turma_id', '=', $id)
            ->select('users.name', 'users.id', 'turmas.turma')
            ->get();

        /*if(empty($alunos)){
            $alunos = "";
            $message = new Home();
            $message->message = "Essa turma não possue alunos";
            $message->color = "primary";
            return redirect()->route('turma.index', $message);
        }*/

        return view('viewsTimeline/viewsColaborador/turma/view_turma', compact('alunos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Turma_aluno  $turma_aluno
     * @return \Illuminate\Http\Response
     */
    public function edit(Turma_aluno $turma_aluno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turma_aluno  $turma_aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turma_aluno $turma_aluno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Turma_aluno  $turma_aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aluno = Turma_aluno::where('user_id', $id)->first();
        $delete = Turma_aluno::find($aluno->id)->delete();
        if($delete){
            return redirect()->route('turma.index');
        }
    }
}
