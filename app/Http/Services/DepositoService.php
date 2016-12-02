<?php
/**
 * Created by PhpStorm.
 * User: Felipe
 * Date: 02/12/2016
 * Time: 10:26
 */

namespace App\Http\Services;


use App\Conta;
use App\Deposito;
use Illuminate\Support\Facades\Auth;

class DepositoService
{
    public function __construct(ContaService $contaService)
    {
        $this->deposito = new Deposito();
        $this->conta = new Conta();
        $this->contaService = $contaService;
    }

    public function listaTodosView()
    {
        $total = 0;
        foreach ($this->deposito->byMes(Auth::user()->id) as $deposito) {
            $total += $deposito->valor;
        }
        return view('depositos.index', [
            'data' => $this->deposito->byMes(Auth::user()->id),
            'total' => $total
        ]);
    }

    public function criarNovoView($conta_id)
    {
        $conta = $this->buscaDespesaPorId($conta_id);
        if (!$this->verificaPermissao($conta)) {
            return view('mensagens.negado');
        }
        return view('depositos.create', [
            'conta' => $conta
        ]);
    }

    public function store($request)
    {
        $conta = $this->buscaDespesaPorId($request->conta_id);
        if (!$this->verificaPermissao($conta)) {
            return view('mensagens.negado');
        }
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $this->deposito->create($data);
        $conta->saldo_atual += $request->valor;
        $conta->update();

        return redirect('/depositos')->with('message', 'Deposito efetuado com sucesso!');
    }

    public function verificaPermissao($conta)
    {
        if ($conta->user_id == Auth::user()->id) {
            return true;
        }
        return false;
    }

    public function buscaDespesaPorId($id)
    {
        return $this->conta->find($id);
    }

}