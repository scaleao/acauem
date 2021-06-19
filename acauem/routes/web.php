<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicacaoController;
use App\Http\Controllers\AtividadeController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\TurmaAlunoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/sobre', [HomeController::class, 'sobre'])->name('home.sobre');
Route::get('/publicacoes', [HomeController::class, 'publicacoes'])->name('home.publicacoes');
Route::get('/apoiadores', [HomeController::class, 'apoiadores'])->name('home.apoiadores');
Route::get('/contato', [HomeController::class, 'contato'])->name('home.contato');
Route::get('/entrar', [HomeController::class, 'entrar'])->name('home.entrar');
Route::post('/entrar', [UserController::class, 'login'])->name('home.login');

Route::get('/new-publication', ['as'=>'home.publicacao', 'uses'=>'HomeController@create']);
Route::post('/new-publication', ['as'=>'publication', 'uses'=>'PublicacaoController@store']);
Route::get('/publication/{id}', ['as'=>'view.publication', 'uses'=>'PublicacaoController@show']);
Route::get('/publication', ['as'=>'index.publication', 'uses'=>'PublicacaoController@index']);

Route::get('/cadastro-colaborador', ['as'=>'home.cadastro-colaborador', 'uses'=>'UserController@createCo']);
Route::post('/cadastro-colaborador', ['as'=>'home.store_colaborador', 'uses'=>'UserController@storeCo']);

Route::group(['middleware'=>'auth'],function() {
    Route::get('/timeline-aluno/{id?}', ['as' => 'timeline.index', 'uses' => 'AtividadeController@indexAluno']);
    Route::get('/timeline-colaborador/{id?}', ['as'=>'timeline.colabora', 'uses'=>'UserController@index']);
    Route::get('/logout', ['as' => 'user.logout', 'uses' => 'UserController@logout']);

    Route::get('/cadastro-aluno', ['as'=>'home.cadastro', 'uses'=>'UserController@createAl']);
    Route::post('/cadastro-aluno', ['as'=>'home.store_aluno', 'uses'=>'UserController@storeAl']);
    Route::get('/edit-aluno/{id}', ['as'=>'aluno.edit', 'uses'=>'UserController@editAl']);
    Route::put('/alterar-aluno/{id}', ['as'=>'aluno.update', 'uses'=>'UserController@updateAl']);
    Route::get('/deletar-aluno/{id}', ['as'=>'aluno.destroy', 'uses'=>'UserController@destroyAl']);

    //Route::get('/cadastro-colaborador', ['as'=>'home.cadastro-colaborador', 'uses'=>'UserController@createCo']);
    //Route::post('/cadastro-colaborador', ['as'=>'home.store_colaborador', 'uses'=>'UserController@storeCo']);
    Route::get('/edit-colaborador/{id}', ['as'=>'colaborador.edit', 'uses'=>'UserController@editCo']);
    Route::put('/alterar-colaborador/{id}', ['as'=>'colaborador.update', 'uses'=>'UserController@updateCo']);
    Route::get('/deletar-colaborador/{id}', ['as'=>'colaborador.destroy', 'uses'=>'UserController@destroyCo']);

    Route::get('/turmas/{id?}', ['as'=>'turma.index', 'uses'=>'TurmaController@index']);
    Route::get('/nova-turma', ['as'=>'turma.create', 'uses'=>'TurmaController@create']);
    Route::post('/nova-turma', ['as'=>'turma.store', 'uses'=>'TurmaController@store']);
    Route::get('/edit-turma/{id}', ['as'=>'turma.edit', 'uses'=>'TurmaController@edit']);
    Route::put('/alterar-turma/{id}', ['as'=>'turma.update', 'uses'=>'TurmaController@update']);
    Route::get('/deletar-turma/{id}', ['as'=>'turma.destroy', 'uses'=>'TurmaController@destroy']);

    Route::post('/turmas_alunos', ['as'=>'turmas.alunos', 'uses'=>'TurmaAlunoController@store']);
    Route::get('/turmas_visualizar/{id}', ['as'=>'turmas.view', 'uses'=>'TurmaAlunoController@show']);
    Route::get('/deletar_aluno_turma/{id}', ['as'=>'turma.aluno.destroy', 'uses'=>'TurmaAlunoController@destroy']);

    Route::get('/atividades/{id?}', ['as'=>'atividade.index', 'uses'=>'AtividadeController@index']);
    Route::get('/nova-atividade', ['as'=>'atividade.create', 'uses'=>'AtividadeController@create']);
    Route::post('/nova-atividade', ['as'=>'atividade.store', 'uses'=>'AtividadeController@store']);
    Route::get('/edit-atividade/{id}', ['as'=>'atividade.edit', 'uses'=>'AtividadeController@edit']);
    Route::put('/alterar-atividade/{id}', ['as'=>'atividade.update', 'uses'=>'AtividadeController@update']);
    Route::get('/deletar-atividade/{id}', ['as'=>'atividade.destroy', 'uses'=>'AtividadeController@destroy']);
});
