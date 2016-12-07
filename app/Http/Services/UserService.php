<?php
/**
 * Created by PhpStorm.
 * User: TI2
 * Date: 06/12/2016
 * Time: 17:10
 */

namespace App\Http\Services;


use App\User;
use Illuminate\Support\Facades\Auth;

class UserService
{

    public function __construct()
    {
        $this->user = new User();
    }

    public function detalhes()
    {
        $user = $this->user->find(Auth::user()->id);
        return view('users.detail', [
            'user' => $user,
            'nav' => ''
        ]);
    }

    public function editarView()
    {
        return view('users.edit', [
            'user' => Auth::user(),
            'nav' => ''
        ]);
    }

    public function update($request)
    {
        if (Auth::user()->id != $request->id) {
            return view('mensagens.negado', [
                'nav' => 'negado'
            ]);
        }

        $user = $this->user->find($request->id);
        $user->update($request->all());
        return redirect('/users/meus-dados')->with('message', 'Usuário alterado com sucesso!');
    }
}