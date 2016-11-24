<?php
/**
 * Created by PhpStorm.
 * User: TI2
 * Date: 24/11/2016
 * Time: 10:03
 */

namespace App\Http\Services;


use App\Pagamento;

class PagamentoService
{
    public function __construct()
    {
        $this->pagamento = new Pagamento();
    }
}