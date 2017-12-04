<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $fillable = ['nome', 'estado_id', 'sigla'];
    
    public function estado() {
        return $this->belongsTo('App\Estado');
    }
}
