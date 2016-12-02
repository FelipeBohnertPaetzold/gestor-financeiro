<?php
/**
 * Created by PhpStorm.
 * User: TI2
 * Date: 18/11/2016
 * Time: 14:13
 */

namespace App\Http\Services;


use App\Conta;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class ContaService
{
    public function __construct()
    {
        $this->conta = new Conta();
        $this->nav = "contas";
    }

    public function listaTodasView()
    {
        $data = Auth::user()->contas;
        $value = 0;
        foreach ($data as $conta) {
            $value += $conta->saldo_atual;
        }
        $total = number_format($value, 2, ",", ".");
        return view('contas.index', [
            'data' => $data,
            'total' => $total,
            'nav' => $this->nav
        ]);
    }

    public function detalhes($id)
    {
        $conta = $this->conta->find($id);
        if (!$this->verificaPermissao($conta)) {
            return view('mensagens.negado');
        }
        return view('contas.detail', [
            'conta' => $conta,
            'nav' => $this->nav
        ]);
    }

    public function criaNovaView()
    {
        return view('contas.create', [
            'nav' => $this->nav
        ]);
    }

    public function editarView($id)
    {
        $conta = $this->conta->find($id);
        if (!$this->verificaPermissao($conta)) {
            return view('mensagens.negado');
        }
        return view('contas.edit', [
            'conta' => $conta,
            'nav' => $this->nav
        ]);
    }

    public function deletarView($id)
    {
        $conta = $this->conta->find($id);
        if(!$this->verificaPermissao($conta)) {
            return view('mensagens.negado');
        }
        return view('contas.delete', [
            'conta' => $conta,
            'nav' => $this->nav
        ]);
    }

    public function store($request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['saldo_atual'] = $request->saldo;
        $this->conta->create($data);
        return redirect('/contas')->with('message',
            'Conta ' . $request['nome'] . ' criada com sucesso!'
        );
    }

    public function update($request)
    {
        $data = $request->all();
        $data['updated_at'] = date('Y-m-d H:i:s');
        $conta = $this->conta->find($request->id);
        if (!$this->verificaPermissao($conta)) {
            return view('mensagens.negado');
        }
        $conta->update($data);
        return redirect('/contas/' . $request->id)->with('message',
            'Conta salva com sucesso!'
        );
    }

    public function destroy($id)
    {
        $conta = $this->conta->find($id);
        if (!$this->verificaPermissão($conta)) {
            return view('mensagens.negado');
        }
        try {
            $conta->delete();
            return redirect('/contas')->with('message', 'Conta removida com sucesso!');
        } catch (QueryException $e) {
            return redirect('/contas/' . $conta->id)->withErrors('Existem vinculos na conta!');
        }
    }

    public function debitarPagamento($conta, $valor)
    {
        $conta->saldo_atual -= $valor;
        $conta->update();
    }

    public function restauraSaldo($id, $valor_a_somar)
    {
        $conta = $this->buscaContaPorId($id);
        $conta->saldo_atual += $valor_a_somar;
        $conta->update();
    }

    public function verificaPermissao($conta)
    {
        if ($conta->user_id == Auth::user()->id) {
            return true;
        }
        return false;
    }

    public function buscaContaPorId($id)
    {
        return $this->conta->find($id);
    }

}