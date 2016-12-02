<?php
/**
 * Created by PhpStorm.
 * User: TI2
 * Date: 24/11/2016
 * Time: 10:03
 */

namespace App\Http\Services;


use App\Conta;
use App\Despesa;
use App\Pagamento;

class PagamentoService
{
    public function __construct(DespesaService $despesaService, ContaService $contaService)
    {
        $this->nav = "despesas";
        $this->conta = new Conta();
        $this->pagamento = new Pagamento();
        $this->despesaService = $despesaService;
        $this->contaService = $contaService;
    }

    public function pagarView($despesaId)
    {
        if (!$this->despesaService->verificaPermissao($this->despesaService->buscaDespesaPorId($despesaId))) {
            return view('mensagens.negado');
        }

        return view('pagamentos.create', [
            'despesa' => $this->despesaService->buscaDespesaPorId($despesaId),
            'nav' => $this->nav
        ]);
    }

    public function store($request)
    {
        $despesa = $this->despesaService->buscaDespesaPorId($request->despesa_id);
        if (!$this->despesaService->verificaPermissao($despesa)) {
            return view('mensagens.negado');
        }

        if($request->valor < $despesa->valor) {
            $despesaData['nome'] = "Restante de " . $despesa->nome;
            $despesaData['descricao'] = "Sobrou de uma conta não paga por completo.";
            $despesaData['mensal'] = false;
            $despesaData['valor'] = $despesa->valor - $request->valor;
            $despesaData['quitada'] = false;
            $despesaData['data_vencimento'] = $request->vencimento_proxima;
            if($request->debito_automatico_proxima) {
                $despesaData['debito_automatico'] = $request->debito_automatico_proxima;
            } else {
                $despesaData['debito_automatico'] = false;
            }
            $despesaData['conta_id'] = $despesa->conta_id;
            $despesaData['user_id'] = $despesa->user_id;
            $despesaData['despesa_id'] = $despesa->id;
            $resiliente = new Despesa();
            $resiliente->create($despesaData);
        }

        $data = $request->all();

        $data['user_id'] = $despesa->user_id;

        $this->pagamento->create($data);

        $this->despesaService->pagamentoDeDespesa($despesa, $request->valor);

        $this->contaService->debitarPagamento($despesa->conta, $request->valor);

        return redirect('/despesas/' . $despesa->id)->with('message', 'Pagamento realizado com sucesso');
    }


}