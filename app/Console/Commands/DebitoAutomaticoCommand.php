<?php

namespace App\Console\Commands;

use App\Conta;
use App\Despesa;
use App\Http\Services\DespesaService;
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
    public function handle(DespesaService $despesaService)
    {
        $despesaService = $despesaService;
        $despesaService->debitoAutomatico();
    }
}
