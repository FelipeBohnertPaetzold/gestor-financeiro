<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    protected $fillable = [
        'id',
        'nome',
        'descricao',
        'mensal',
        'valor',
        'quitada' ,
        'debito_automatico',
        'data_vencimento',
        'conta_id',
        'user_id',
        'despesa_id'
    ];

    protected $table = 'despesa';

    public function despesa()
    {
        return $this->belongsTo(Despesa::class, 'despesa_id');
    }

    public function despesas()
    {
        return $this->hasMany(Despesa::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function despesaMesByUserId($user_id)
    {
        return $this->where('user_id', '=', $user_id)
            ->whereYear('data_vencimento' , '=', date('Y'))
            ->whereMonth('data_vencimento', '=', date('m'))
            ->get();
    }

    public function despesaMes()
    {
        return $this->where('data_vencimento' , '<=', date('Y-m'))->get();
    }

    public function retornaTudoDoUsuario($id)
    {
        return $this->where('user_id', '=', $id)->get();
    }

    public function debitarAutomatico()
    {
        return $this->where('debito_automatico', '=', true)
            ->where('quitada', '=', false)
            ->where('data_vencimento', '<=', date('Y-m-d'))
            ->get();
    }

    public function pagamentos()
    {
        return $this->hasMany(Pagamento::class);
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
