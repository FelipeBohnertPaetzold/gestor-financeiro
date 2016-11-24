<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = ['id', 'descricao', 'valor', 'conta_id', 'user_id'];

    protected $table = 'pagamento';
}
