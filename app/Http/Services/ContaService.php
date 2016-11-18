<?php
/**
 * Created by PhpStorm.
 * User: TI2
 * Date: 18/11/2016
 * Time: 14:13
 */

namespace App\Http\Services;


use App\Conta;
use Illuminate\Support\Facades\Auth;

class ContaService
{
    public function __construct()
    {
        $this->conta = new Conta();
    }

    public function listaTodasView() {
        return view('contas.index', [
            'data' => $this->conta->contasDoUsuario(Auth::user())
        ]);
    }

    public function criaNovaView()
    {
        return view('contas.create');
    }

    public function store($request)
    {
        $request['user_id'] = Auth::user()->id;
        $this->conta->create($request->all());
        return redirect('/contas')->with('message', 'Conta '. $request['nome'] . ' criada com sucesso!');
    }
}