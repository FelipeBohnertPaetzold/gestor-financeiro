<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
    protected $fillable = [
        'id',
        'valor',
        'descricao',
        'user_id',
        'conta_id'
    ];

    protected $table = 'deposito';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function conta()
    {
        return $this->belongsTo(Conta::class, 'conta_id');
    }

    public function byDate($inicial, $final, $user_id)
    {
        return $this->where('user_id', '=', $user_id)
            ->where('created_at', '>=', $inicial)
            ->where('created_at', '<=', $final)
            ->get();
    }

    public function byMes($user_id)
    {
        return $this->where('user_id', '=', $user_id)
            ->whereMonth('created_at', '=', date('m'))
            ->whereYear('created_at', '=', date('Y'))
            ->get();
    }
}
