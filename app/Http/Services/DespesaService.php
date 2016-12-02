<?php
/**
 * Created by PhpStorm.
 * User: TI2
 * Date: 18/11/2016
 * Time: 14:08
 */

namespace App\Http\Services;


use App\Conta;
use App\Despesa;
use App\Pagamento;
use Illuminate\Support\Facades\Auth;

class DespesaService
{
    public function __construct(ContaService $contaService)
    {
        $this->despesa = new Despesa();
        $this->contaService = $contaService;
    }

    public function listaTodasView()
    {
        $data = Auth::user()->contas;
        $despesas = Auth::user()->despesas;
        $value = 0;
        foreach ($despesas as $despesa) {
            if (date('Y-m', strtotime($despesa->data_vencimento)) <= date('Y-m')) {
                $value += $despesa->valor;
            }
        }
        $total = number_format($value, 2, ",", ".");

        return view('despesas.index', [
            'data' => $data,
            'total' => $total,
            'despesas' => $despesas
        ]);
    }

    public function detalhes($id)
    {
        if (!$this->verificaPermissao($this->buscaDespesaPorId($id))) {
            return view('mensagens.negado');
        }
        return view('despesas.detail', [
            'despesa' => $this->buscaDespesaPorId($id)
        ]);
    }

    public function destroy($id)
    {
        if (!$this->verificaPermissao($this->buscaDespesaPorId($id))) {
            return view('mensagens.negado');
        }

        $despesa = $this->buscaDespesaPorId($id);
        $valor_a_somar = 0;
        foreach ($despesa->pagamentos as $pagamento) {
            $valor_a_somar += $pagamento->valor;
            $pagamento->delete();
        }

        $this->contaService->restauraSaldo($despesa->conta_id, $valor_a_somar);
        foreach ($despesa->despesas as $des) {
            $des->delete();
        }
        $despesa->delete();
        return redirect('/contas')->with('message', 'Despesa removida com sucesso!');
    }

    public function deletarView($id)
    {
        if (!$this->verificaPermissao($this->buscaDespesaPorId($id))) {
            return view('mensagens.negado');
        }
        return view('despesas.delete', [
            'despesa' => $this->buscaDespesaPorId($id)
        ]);
    }

    public function filtroData($request)
    {
        $inicial = \DateTime::createFromFormat('d/m/Y', $request->inicial);
        $final = \DateTime::createFromFormat('d/m/Y', $request->final);

        $ini = $inicial->format('Y') . '-' . $inicial->format('m') . '-' . $inicial->format('d') . ' 00:00:00';
        $fin = $final->format('Y') . '-' . $final->format('m') . '-' . $final->format('d') . ' 00:00:00';

        $despesas = $this->despesa->despesasPorData($ini, $fin, Auth::user()->id);
        $data = Auth::user()->contas->all();

        foreach ($data as $conta) {
            $posicao = 0;

            $valor = 0;
            foreach ($despesas as $despesa) {
                $valor += $despesa->valor;
                if ($conta->id == $despesa->conta_id) {

                    array_add($conta, " $posicao", $despesa);
                    $posicao++;
                }
            }
        }

        $total = number_format($valor, 2, ",", ".");

        return view('despesas.filtro_data', [
            'data' => $data,
            'total' => $total
        ]);
    }

    public function store($request)
    {
        if (!$this->contaService->verificaPermissao($this->contaService->buscaContaPorId($request->conta_id))) {
            return view('mensagens.negado');
        }
        $request->user_id = Auth::user()->id;
        $vencimento = \DateTime::createFromFormat('d/m/Y', $request->data_vencimento);
        $mes = $vencimento->format('m');
        $ano = $vencimento->format('Y');
        if ($request->parcelas > 1) {
            for ($i = 0; $i < $request->parcelas; $i++) {
                if ($mes > 12) {
                    $mes = 1;
                    $ano++;
                }
                $s = $ano . '-' . $mes . '-' . $vencimento->format('d') . ' 00:00:00';
                $data = $request->all();
                $data['data_vencimento'] = $s;
                $data['mensal'] = true;
                $data['user_id'] = Auth::user()->id;
                $data['quitada'] = false;
                $this->despesa->create($data);

                $mes++;
            }

            return redirect('/despesas')->with('message', 'Despesa criada com sucesso!');
        }
        $vencimento = \DateTime::createFromFormat('d/m/Y', $request->data_vencimento);
        $s = $ano . '-' . $mes . '-' . $vencimento->format('d') . ' 00:00:00';
        $data = $request->all();
        $data['data_vencimento'] = $s;
        $data['mensal'] = true;
        $data['user_id'] = Auth::user()->id;
        $data['quitada'] = false;

        $this->despesa->create($data);
        return redirect('/despesas')->with('message', 'Despesa criada com sucesso!');
    }

    public function pagamentoDeDespesa($despesa, $valor)
    {
        $despesa->quitada = true;
        $despesa->update();
    }

    public function debitoAutomatico()
    {
        $despesa = new Despesa();

        $data = $despesa->debitarAutomatico();

        foreach ($data as $despesa) {
            $pagamentoData['descricao'] = "Pagamento automático de " . $despesa->nome . "!";
            $pagamentoData['valor'] = $despesa->valor;
            $pagamentoData['conta_id'] = $despesa->conta_id;
            $pagamentoData['data_pagamento'] = date("Y-m-d H:i:s");
            $pagamentoData['despesa_id'] = $despesa->id;
            $pagamentoData['user_id'] = $despesa->user_id;

            $pagamento = new Pagamento();

            $conta = new Conta();
            $conta = $conta->find($despesa->conta_id);
            $pagamento = $pagamento->create($pagamentoData);
            $conta->saldo_atual -= $pagamento->valor;
            $conta->update();
            $despesa->quitada = true;
            $despesa->update();
        }
    }

    public function criaNovaView()
    {
        return view('despesas.create', [
            'contas' => Auth::user()->contas
        ]);
    }

    public function verificaPermissao($despesa)
    {
        if ($despesa->user_id == Auth::user()->id) {
            return true;
        }
        return false;
    }

    public function buscaDespesaPorId($id)
    {
        return $this->despesa->find($id);
    }
}