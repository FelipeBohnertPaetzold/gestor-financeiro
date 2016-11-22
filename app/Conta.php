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

    public function filtraData($inicial, $final)
    {
        return $this->despesas()
            ->where('data_vencimento', '>=', $inicial)
            ->where('data_vencimento', '<=', $final);
    }

    public function despesasMes()
    {
        return $this->despesas()
            ->whereMonth('data_vencimento', '=', date('m'))
            ->whereYear('data_vencimento', '=', date('Y'));
    }

    public function despesas()
    {
        return $this->hasMany(Despesa::class);
    }

}
