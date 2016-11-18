<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    protected $fillable = ['id', 'nome', 'chave_de_tema'];

    protected $table = 'tema';


}
