<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artigo extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at', 'data', 'created_at', 'updated_at'];

    protected $fillable = ['titulo', 'descricao', 'conteudo', 'data'];
}
