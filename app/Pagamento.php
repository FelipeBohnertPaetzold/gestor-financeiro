<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = ['id', 'descricao', 'valor', 'conta_id', 'data_pagamento', 'despesa_id', 'user_id'];

    protected $table = 'pagamento';

    public function conta()
    {
        return $this->belongsTo(Conta::class, 'conta_id');
    }

    public function despesa()
    {
        return $this->belongsTo(Despesa::class, 'despesa_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
