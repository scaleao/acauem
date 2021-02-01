<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turma_aluno extends Model
{
    protected $fillable = [
        'id', 'user_id', 'turma_id',
    ];
}
