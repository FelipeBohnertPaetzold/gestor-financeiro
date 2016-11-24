<?php

namespace App\Http\Controllers;

use App\Http\Services\PagamentoService;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function __construct(PagamentoService $service)
    {
        $this->service = $service;
    }

    public function pagarView($despesaId)
    {
        return $this->service->pagarView($despesaId);
    }

    public function store(Request $request)
    {
        return $this->service->store($request);
    }
}
