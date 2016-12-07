<?php
/**
 * Created by PhpStorm.
 * User: TI2
 * Date: 06/12/2016
 * Time: 17:10
 */

namespace App\Http\Services;


use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        try {
            $user = $this->user->find($request->id);
            $user->update($request->all());
            return redirect('/users/meus-dados')->with('message', 'Usuário alterado com sucesso!');
        } catch (QueryException $e) {
            $errors = ['email' => 'Email já existente'];
            return redirect('/users/meus-dados/editar')->withErrors($errors);
        }
    }

    public function alterarSenhaView()
    {
        $user = $this->user->find(Auth::user()->id);
        return view('users.alter_password', [
            'user' => $user,
            'nav' => ''
        ]);
    }

    public function alterarSenha($request)
    {
        if ($request->id != Auth::user()->id) {
            return view('mensagens.negado', [
                'nav' => 'negado'
            ]);
        }

        $user = $this->user->find(Auth::user()->id);

        if (!Hash::check($request['password'], $user->password)) {
            $errors = ['password' => 'Senha não confere'];
            return redirect('/users/alterar-senha')->withErrors($errors);
        }

        $user->password = bcrypt($request->new_password);
        $user->update();

        return redirect('/users/meus-dados')->with('message', 'Senha alterada com sucesso');
    }
}