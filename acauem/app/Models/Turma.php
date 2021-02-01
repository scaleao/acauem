<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = [
        'id', 'cor', 'turma', 'descricao', 'quantidade', 'created_at'
    ];
}
