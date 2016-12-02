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

    public function criarNovoView($conta_id)
    {
        return $this->service->criarNovoView($conta_id);
    }

    public function store(Request $request)
    {
        return $this->service->store($request);
    }
}
