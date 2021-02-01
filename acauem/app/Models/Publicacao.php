<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacao extends Model
{
    protected $fillable = [
        'id', 'titulo', 'tituloPrincipal', 'subTexto', 'capa', 'conteudo', 'created_at'
    ];
}
