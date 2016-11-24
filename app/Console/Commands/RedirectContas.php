<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RedirectContas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redirect:contas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Redireciona para a pagina contas';

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
        \Log::info('\n Eu estive aqui as @' . \Carbon\Carbon::now());
    }
}
