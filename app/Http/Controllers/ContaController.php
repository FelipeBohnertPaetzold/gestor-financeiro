<?php

namespace App\Http\Controllers;

use App\Http\Services\ContaService;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function __construct(ContaService $service)
    {
        $this->service = $service;
    }

    public function listaTodasView()
    {
        return $this->service->listaTodasView();
    }

    public function criaNovaView()
    {
        return $this->service->criaNovaView();
    }

    public function store(Request $request)
    {
        return $this->service->store($request);
    }
}
