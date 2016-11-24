<?php
/**
 * Created by PhpStorm.
 * User: TI2
 * Date: 24/11/2016
 * Time: 10:03
 */

namespace App\Http\Services;


use App\Conta;
use App\Pagamento;

class PagamentoService
{
    public function __construct(DespesaService $despesaService, ContaService $contaService)
    {
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
            'despesa' => $this->despesaService->buscaDespesaPorId($despesaId)
        ]);
    }

    public function store($request)
    {
        $despesa = $this->despesaService->buscaDespesaPorId($request->despesa_id);
        if (!$this->despesaService->verificaPermissao($despesa)) {
            return view('mensagens.negado');
        }

        $data = $request->all();

        $data['user_id'] = $despesa->user_id;

        $this->pagamento->create($data);

        $this->despesaService->pagamentoDeDespesa($despesa, $request->valor);

        $this->contaService->debitarPagamento($despesa->conta, $request->valor);

        return redirect('/despesas/' . $despesa->id)->with('message', 'Pagamento realizado com sucesso');
    }


}