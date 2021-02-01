<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $fillable = [
        'id', 'titulo', 'descricao', 'link', 'turma_id', 'user_id', 'created_at'
    ];
}
