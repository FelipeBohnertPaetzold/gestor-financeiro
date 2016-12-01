<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    protected $fillable = ['id', 'nome', 'descricao', 'mensal', 'valor', 'quitada' , 'debito_automatico', 'data_vencimento', 'conta_id', 'user_id'];

    protected $table = 'despesa';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function despesaMes()
    {
        return $this->where('data_vencimento' , '<=', date('Y-m'))->get();
    }

    public function conta()
    {
        return $this->belongsTo(Conta::class, 'conta_id');
    }

    public function despesasPorData($inicial, $final, $user_id)
    {
        return $this->where('user_id' , '=', $user_id)
            ->where('data_vencimento', '>=', $inicial)
            ->where('data_vencimento', '<=', $final)
            ->get();
    }
}
