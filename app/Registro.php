<?php

namespace therapeasy;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $fillable = [
        'conclusao',
        'data',
        'emocoes',
        'pensamentos_automatico',
        'resultado',
        'situacao',
        'idcliente',
    ];
}
