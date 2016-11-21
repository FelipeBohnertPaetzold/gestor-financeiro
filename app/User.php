<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'imagem', 'tema_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tema()
    {
        return $this->belongsTo(Tema::class, 'tema_id');
    }

    public function contas()
    {
        return $this->hasMany(Conta::class);
    }

    public function despesas()
    {
        return $this->hasMany(Despesa::class);
    }
}
