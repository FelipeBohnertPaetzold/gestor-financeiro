<?php

namespace App\Http\Controllers;

use App\Http\Services\DepositoService;
use Illuminate\Http\Request;

class DepositoController extends Controller
{
    public function __construct(DepositoService $service)
    {
        $this->service = $service;
    }

    public function listaTodosView()
    {
        return $this->service->listaTodosView();
    }

    public function filtroData(Request $request)
    {
        return $this->service->filtroData($request);
    }

    public function detalhes($id)
    {
        return $this->service->detalhes($id);
    }

    public function criarNovoView($conta_id)
    {
        return $this->service->criarNovoView($conta_id);
    }

    public function store(Request $request)
    {
        return $this->service->store($request);
    }
}
