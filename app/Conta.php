<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Conta extends Model
{
    protected $fillable = ['id', 'nome', 'descricao', 'saldo', 'user_id'];

    protected $table = 'conta';

    protected function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function despesaMes()
    {
        return DB::table('despesa')->where('data_vencimento' , '=', date('Y-m'))->get();
    }

    public function despesas()
    {
        return $this->hasMany(Despesa::class);
    }

}
