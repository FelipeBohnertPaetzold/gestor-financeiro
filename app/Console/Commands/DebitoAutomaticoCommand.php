<?php

namespace App\Console\Commands;

use App\Conta;
use App\Despesa;
use App\Pagamento;
use Illuminate\Console\Command;

class DebitoAutomaticoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'debito:automatico';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Debita automaticamente as despesas';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
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
}
