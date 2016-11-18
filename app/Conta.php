<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $fillable = ['id', 'nome', 'descricao', 'saldo', 'user_id'];

    protected $table = 'conta';

    protected function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function contasDoUsuario($user) {
        return $this->where('user_id', '=', $user->id)->get();
    }
}
